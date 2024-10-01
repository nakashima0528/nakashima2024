<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\SendMailRequest;
use App\Mail\InformationMail;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Flash;
use Response;

class UserController extends AppBaseController
{
    /** @var UserRepository $userRepository*/
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all()->sortByDesc("id");

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = array_merge($request->all(),['password' => Hash::make($request->password)]);

        $user = $this->userRepository->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        $addresses = $this->userRepository->getAddress($id);
        $parcels = $this->userRepository->getParcel($id);
        $invoices = $this->userRepository->getInvoice($id);
        $tickets = $this->userRepository->getTicket($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('admin.users.show')->with('user', $user)
                                       ->with('addresses', $addresses)
                                       ->with('parcels', $parcels)
                                       ->with('invoices', $invoices)
                                       ->with('tickets', $tickets);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        $user = $this->userRepository->update($request->all(),$id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Send Mail.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function mail($id,$type)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');
            return back();
        }

        $subject = $this->userRepository->valueOfFindSystem(config('const.infomationmail.template.system_settings.'.$type.'.subject'));
        // 顧客NO置換
        $subject = str_replace(config('const.infomationmail.template.replace.no'), Helper::getAccountNo($user->id), $subject);

        $salutation = 'Dear '.config('const.user.title_list.'.$user->title).' '.$user->surname;
        $body = $this->userRepository->valueOfFindSystem(config('const.infomationmail.template.system_settings.'.$type.'.body'));

        $footer = $this->userRepository->valueOfFindSystem(config('const.infomationmail.template.footer'));

        return view('admin.users.mail')->with('user', $user)
                                       ->with('type', $type)
                                       ->with('subject', $subject)
                                       ->with('salutation', $salutation)
                                       ->with('body', $body)
                                       ->with('footer', $footer);
    }

    /**
     * Send Mail.
     *
     * @param SendMailRequest $request
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function send(SendMailRequest $request)
    {
        $user = $this->userRepository->find($request->user_id);

        if (empty($user)) {
            Flash::error('User not found');
            return back();
        }

    //    $data['user'] = $user;
        $data['subject'] = $request->subject;
        $data['salutation'] = $request->salutation;
        $data['body'] = $request->body;
        $data['button'] = isset($request->button) ? $request->button : '0';
        $data['footer'] = $request->footer;
        Mail::to($user->email)->send(new InformationMail($data));

        Flash::success('Mail has been sent successfully.');

        return redirect(route('users.show', [$user->id]));
    }

    /**
     * Admin -- Show the User CSV.
     */
    public function csvUser()
    {
        return view('admin.users.csv');
    }

    /**
     * Admin -- Download User CSV.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function csvUserDownload(Request $request)
    {
        $query = \App\Models\User::where('id','>','0');

        if($request->status != ''){
            $query->where('status',$request->status);
        }
        if($request->user_id != ''){
            $user_id = str_replace('JP', '', $request->user_id);;
            $query->where('user_id',$user_id);
        }
        if($request->created_from != ''){
            $query->whereDate('created_at', '>=',$request->created_from);
        }
        if($request->created_to != ''){
            $query->whereDate('created_at', '<=',$request->created_to);
        }

        $users = $query->orderBy('id');

        // コールバック関数に１行ずつ書き込んでいく処理を記述
        $callback = function () use ($users) {
            // 出力バッファをopen
            $stream = fopen('php://output', 'w');
            // 文字コードをShift-JISに変換
//            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');
            // ヘッダー行
            fputcsv($stream, [
                'user_id',
                'status',
                'email',
                'identity',
                'title',
                'forename',
                'surname',
                'birth',
                'notes',
                'country',
                'address1',
                'address2',
                'city',
                'county',
                'post',
            ]);

            // ２行目以降の出力
            // cursor()メソッドで１レコードずつストリームに流す処理を実現できる。
            foreach ($users->cursor() as $user) {

                $row = [];
                $row[] = 'JP'.$user->id;
                $row[] = config('const.user.status_list.'.$user->status);
                $row[] = $user->email;
                $row[] = $user->identity == config('const.check.cd.ON') ? 'OK' : '';
                $row[] = config('const.user.title_list.'.$user->title);
                $row[] = $user->forename;
                $row[] = $user->surname;
                $row[] = $user->birth;
                $row[] = $user->notes;
                $address = \App\Models\Address::where('user_id',$user->id)->where('type',config('const.address.type.CURRENT'))->first();
                if(isset($address)){
                    $row[] = $address->country;
                    $row[] = $address->address1;
                    $row[] = $address->address2;
                    $row[] = $address->city;
                    $row[] = $address->county;
                    $row[] = $address->post;
                }

                fputcsv($stream, $row);
            }
            fclose($stream);
        };
        
        // 保存するファイル名
        $filename = sprintf('user-%s.csv', date('YmdHis'));
        
        // ファイルダウンロードさせるために、ヘッダー出力を調整
        $header = [
            'Content-Type' => 'application/octet-stream',
        ];
        
        return response()->streamDownload($callback, $filename, $header);

    }

    /**
     * メールアドレスの再設定処理
     *
     * @param Request $request
     * @param [type] $token
     */
    public function resetEmail(Request $request, $token)
    {
        $email_resets = \Illuminate\Support\Facades\DB::table('email_resets')
            ->where('token', $token)
            ->first();

        // トークンが存在している、かつ、有効期限が切れていないかチェック
        if ($email_resets && !$this->tokenExpired($email_resets->created_at)) {

            // ユーザーのメールアドレスを更新
            $user = \App\Models\User::find($email_resets->user_id);
            $user->email = $email_resets->new_email;
            $user->save();

            // レコードを削除
            \Illuminate\Support\Facades\DB::table('email_resets')
                ->where('token', $token)
                ->delete();

            \Session::flash('flash_success', 'Updated email address.');
        } else {
            // レコードが存在していた場合削除
            if ($email_resets) {
                \Illuminate\Support\Facades\DB::table('email_resets')
                    ->where('token', $token)
                    ->delete();
            }
            \Session::flash('flash_error', 'Expired to update email address.');
        }
        if (Auth::check()) {
            return redirect('/home/pesonal');
        } else {
            return redirect('/login');
        }
    }
    /**
     * トークンが有効期限切れかどうかチェック
     *
     * @param  string  $createdAt
     * @return bool
     */
    protected function tokenExpired($createdAt)
    {
        // トークンの有効期限は60分に設定
        $expires = 60 * config('const.changeemail.expires');
        return \Carbon\Carbon::parse($createdAt)->addSeconds($expires)->isPast();
    }

}
