<?php

namespace App\Http\Controllers\home;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Mail\ContactMail;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Str;

class HomeController extends Controller
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('verified');
        $this->userRepository = $userRepo;
    }

    /**
     * Show the Registration Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        $user = Auth::user();
        // テンポラリーユーザの場合は正式登録画面へ
        if(isset($user) && $user->status != config('const.user.status.TEMPORARY')){
            return redirect('/login');
        }
        return view('home.registration')->with('user',$user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param RegisterUserRequest $request
     *
     * @return Response
     */
    public function updateRegistration(RegisterUserRequest $request)
    {
        $user = Auth::user();
    
        // パスワード暗号化
        $input = array_merge($request->all(),['password' => Hash::make($request->password)]);
    
        $model = $this->userRepository->update($input,$user->id);
        // AddressにCurrent住所を作成
        $address = $this->userRepository->createCurrentAddress($input,$user->id);

        \Session::flash('flash_success', 'Your account has been created.');
        return redirect('/home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // テンポラリーユーザの場合は正式登録画面へ
        $user = Auth::user();
        if(isset($user) && $user->status == config('const.user.status.TEMPORARY')){
            return redirect('/registration');
        }
        return view('home.index');
    }

     /**
     * Show the application dashboard. adminよりなり替わり
     *
     * @return \Illuminate\Http\Response
     */
    public function proxy($id)
    {
        // 遷移前のページを取得
        $previous = url()->previous();
        // 管理画面のメンバー一覧ページから遷移した場合しか代理ログインはさせない
        if($previous != url('').'/admin/users') abort(404);
        $user = User::find($id);
        // ログイン
        Auth::guard('admin')->logout();
        Auth::guard('web')->login($user);

        return redirect('/home'); // ユーザ側のページにリダイレクト
    }    

    /**
     * Show the PERSONAL DETAILS.
     */
    public function pesonal()
    {
        $user = Auth::user();
        return view('home.pesonal.index')->with('user',$user);
    }

    /**
     * Show the EDIT EMAIL ADDRESS.
     */
    public function pesonalEmail()
    {
        $user = Auth::user();
        return view('home.pesonal.email')->with('user',$user);
    }

    /**
     * Send link.
     */
    public function sendChangeEmailLink(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:users',
        ]);

        $new_email = $request->email;

        // トークン生成
        $token = hash_hmac(
            'sha256',
            Str::random(40) . $new_email,
            config('app.key')
        );

        // トークンをDBに保存
        DB::beginTransaction();
        try {
            $param = [];
            $param['user_id'] = Auth::id();
            $param['new_email'] = $new_email;
            $param['token'] = $token;
            $email_reset = \App\Models\EmailReset::create($param);

            DB::commit();

            $email_reset->sendEmailResetNotification($token);
            \Session::flash('flash_success', 'An email has been sent with a link for verification.');

        } catch (\Exception $e) {
            DB::rollback();
            \Session::flash('flash_error', 'Email update failed.');
        }
        return redirect('/home/pesonal/email');
    }
    
    /**
     * Show the SHIPPING CONCIERGE.
     */
    public function scs()
    {
        return view('home.scs');
    }

    /**
     * Show the JAPAN ADDRESS.
     */
    public function jpaddress()
    {
        return view('home.jpaddress');
    }

    /**
     * Show the IDENTITY VERIFICATION.
     */
    public function identity()
    {
        return view('home.identity');
    }

    /**
     * Show the PERSONAL CONCIERGE.
     */
    public function pcs()
    {
        return view('home.pcs');
    }

    /**
     * Show the VIP SERIVCE.
     */
    public function vip()
    {
        $user = Auth::user();
        $tickets = $this->userRepository->getUserTicket($user->id);
        return view('home.vip')->with('tickets',$tickets);
    }

    /**
     * Show the CONTACT JP CONCIERGE.
     */
    public function contact()
    {
        return view('home.contact');
    }
    public function sendContact(ContactRequest $request)
    {
    	$data = [];

        $user = Auth::user();
        $data['user'] = $user;
        $data['subject'] = config('const.contact.subject.list.'.$request->subject);
        $data['message'] = $request->message;
        // 添付ファイル
        if($request->file('attach')){
            $data['attach_name'] = $request->file('attach')->getClientOriginalName();
            // 一次保存
            $data['attach'] = $request->file('attach')->store(config('const.contact.storage'));
            Log::info('sendContact user:' . $data['user'] . ' subject:' .$data['subject'] . ' attach_name:' . $data['attach_name']);
        }else{
            Log::info('sendContact user:' . $data['user'] . ' subject:' .$data['subject'] . ' attach_name:');
        }
    
        Mail::to(config('const.mail.to'))->send(new ContactMail($data));

        // 添付ファイル一次保存削除
        if(isset($data['attach'])){
            \Storage::disk('local')->delete($data['attach']);
        }

        \Session::flash('flash_success', 'Thank you for sending your inquiry. We’ll contact you by email shortly.');
        return redirect('/home/contact');
    }

    /**
     * Show the CHANGE PASSWORD.
     */
    public function password()
    {
        return view('home.password');
    }

    public function updatePassword(Request $request)
    {
        //新規パスワードの確認
        $this->validator($request->all())->validate();

        $user = Auth::user();
        if(!password_verify($request->current_password,$user->password)) {
            \Session::flash('flash_error', 'Current Password is incorrect.');
            return redirect(route('home.password'));
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        \Session::flash('flash_success', 'Password has been successfully changed.');
        return redirect(route('home.password'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data,[
            'current_password' => 'required',
            'new_password' => ['required','confirmed',Password::min(8)->letters()->mixedCase()],
            'new_password_confirmation' => 'required',
        ]);
    }

}
