<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout');
    }
    public function saveCustomerInfo(Request $request){
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = bcrypt($request->password);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customer_id', $customerId);
        Session::put('customerName', $customer->name.' '.$customer->last_name);
        $data = $customer->toArray();
        Mail::send('front-end.confirmation.confirmation-mail', $data, function ( $message) use ($data){
          $message->to($data['email_address']);
          $message->subject('Congratulation');

        });

        return redirect('/show-shipping');

    }
    public function showShipping(){

        $customer = Customer::find(Session::get('customer_id'));
        return view('front-end.checkout.show-shipping',['customer'=>$customer]);
    }
    public function saveShippingInfo(Request $request){

        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shipping_id', $shipping->id);
        return redirect('/show-payment');
    }

    public function showPaymentInfo(){
        return view('front-end.checkout.payment-form');
    }

    public function saveOrderInfo(Request $request){
        $paymentType = $request->payment_type;
        if ($paymentType == 'cash'){
            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            $order->order_total = Session::get('grandTotal');
            $order->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();

            $cartproducts = Cart::content();

            foreach ($cartproducts as $cartproduct){
                $orderDetail =  new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartproduct->id;
                $orderDetail->product_name = $cartproduct->name;
                $orderDetail->product_price = $cartproduct->price;
                $orderDetail->product_quantity = $cartproduct->qty;
                $orderDetail->save();

            }
            Cart::destroy();
            return redirect('/complete-order');

        }elseif ($paymentType == 'bkash'){
            return 'baksh';
        }elseif ($paymentType == 'card'){
            return 'card';
        }
    }

    public function completeOrder(){

        return view('front-end.checkout.complete-order');
    }
    public function customerLogout(){
        Session::forget('customer_id');
        Session::forget('shipping_id');

        return redirect('/');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function customerLogin(Request $request){
         $customer = Customer::where('email_address', $request->email_address)->first();
        if ($customer){
            if (password_verify($request->password, $customer->password)) {

                Session::put('customer_id', $customer->id);
                Session::put('customerName', $customer->first_name.' '.$customer->last_name);

                return redirect('/show-shipping');


            } else {
                return redirect('/checkout')->with('message', 'Password is invalid');
            }

        }else{
            return redirect('/checkout')->with('message', 'Email Address is invalid');

        }

    }
    public function ajaxEmailCheck($a){
        $customer = Customer::where('email_address', $a)->first();
        if ($customer){
        echo 'already exist';
        }else{
            echo 'Available';
        }


    }


}
