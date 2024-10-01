<?php

namespace App\Http\Controllers\Home;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PaymentStripe;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * PAYMENT METHOD
     */
    public function index(){
        $user = Auth::user();
        $defaultCard = PaymentStripe::getDefaultcard($user);

        return view('home.payment.index', compact('user', 'defaultCard'));
    }

    /**
     * PAYMENT METHOD STRIPE create
     */
    public function createCC(){

        $user = Auth::user(); //要するにUser情報を取得したい
        return view('home.payment.cc.create');

    }

    /**
     * PAYMENT METHOD STRIPE store
     */
    public function storeCC(Request $request){
        /**
         * フロントエンドから送信されてきたtokenを取得
         * これがないと一切のカード登録が不可
         **/
        $token = $request->stripeToken;
        $user = Auth::user(); //要するにUser情報を取得したい
        $ret = null;

        /**
         * 当該ユーザーがtokenもっていない場合Stripe上でCustomer（顧客）を作る必要がある
         * これがないと一切のカード登録が不可
         **/
        if ($token) {

            /**
             *  Stripe上にCustomer（顧客）が存在しているかどうかによって処理内容が変わる。
             *
             * 「初めての登録」の場合は、Stripe上に「Customer（顧客」と呼ばれる単位の登録をして、その後に
             * クレジットカードの登録が必要なので、一連の処理を内包しているPaymentモデル内のsetCustomer関数を実行
             *
             * 「2回目以降」の登録（別のカードを登録など）の場合は、「Customer（顧客」を新しく登録してしまうと二重顧客登録になるため、
             *  既存のカード情報を取得→削除→新しいカード情報の登録という流れに。
             *
             **/

            if (!$user->stripe_id) {
                $result = PaymentStripe::setCustomer($token, $user);

                /* card error */
                if(!$result){
                    \Session::flash('flash_error', 'Failed to register credit card. Please try with a different credit card.');
                    return redirect('/home/payment/cc/create');
                }

            } else {
                $defaultCard = PaymentStripe::getDefaultcard($user);
                if (isset($defaultCard['id'])) {
                    PaymentStripe::deleteCard($user);
                }
                $result = PaymentStripe::updateCustomer($token, $user);

                /* card error */
                if(!$result){
                    \Session::flash('flash_error', 'Failed to register credit card. Please try with a different credit card.');
                    return redirect('/home/payment/cc/create');
                }

            }
        } else {
            \Session::flash('flash_error', 'Failed to register credit card.');
            return redirect('/home/payment/cc/create');
        }

        \Session::flash('flash_success', 'Credit card registration is complete.');

        return redirect('/home/payment');
    }

    /**
     * PAYMENT METHOD STRIPE destroy
     */
    public function destroyCC(){
        $user = User::find(Auth::id());

        $result = PaymentStripe::deleteCard($user);

        if($result){
            \Session::flash('flash_success', 'Credit card has been deleted.');
            return redirect('/home/payment');
        }else{
            \Session::flash('flash_error', 'Failed to delete credit card.');
            return redirect('/home/payment');
        }
    }

}
