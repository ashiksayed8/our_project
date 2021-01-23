<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use Cart;
use Session;
class PaymentController Extends Controller
{


	public function __construct()

	{
		$this->middleware('auth');
	}

	public function payment(Request $request)
	{
		$data=array();
		$data['name']=$request->name;
		$data['email']=$request->email;
		$data['phone']=$request->phone;
		$data['address']=$request->address;
		$data['city']=$request->city;
		$data['payment']=$request->payment;

		if($request->payment == 'stripe')
		{
			return view('front_view.payment.stripe',compact('data'));
		}

		elseif ($request->payment == 'paypal') {
			# code...
		}

		elseif ($request->payment == 'ideal') {
			# code...
		}

		else
		{
			echo "Handcash";
		}
	}

	public function STripeCharge(Request $request)
	{
		$total=$request->total;
        $var1 = (float) str_replace(',', '', $total);
		\Stripe\Stripe::setApiKey('sk_test_51IAfYoKCKrfkWzTo9iyJP0FXnKZ3ru8Ai8sPk85QiwRXTzGdJGyB5OoWiXDXK3oYZSWRXfeAjcTWAXgOMTzdFKQE000sBwvOUx');

		$token=$_POST['stripeToken'];
		$charge=\Stripe\Charge::create([
			'amount'=>100,
			'amount'=>$var1*100,
			'currency'=>'usd',
			'description'=>'Easy shopping',
			'source'=>$token,
			'metadata'=>['order_id'=>uniqid()],
		]);
	
		$data=array();
		$data['user_id']=Auth::id();
		$data['payment_id']=$charge->payment_method;
		$data['paying_amount']=$charge->amount/100;
		$data['blnc_transection']=$charge->balance_transaction;
		$data['stripe_order_id']=$charge->metadata->order_id;
		$data['shipping']=$request->shipping;
		$data['vat']=$request->vat;
		$data['total']=$request->total;
		$data['payment_type']=$request->payment_type;

		if(Session::has('coupon'))
		{
			$data['subtotal']=Session::get('coupon')['balance'];
		}
		else
		{
			$data['subtotal']=Cart::subtotal();
		}

		$data['status']=0;
		$data['date']=date('d-m-y');
		$data['month']=date('F');
		$data['year']=date('Y');
		$data['status_code']=mt_rand(100000,999999);
		
		

		$order_id=DB::table('orders')->InsertGetId($data);

		//insert shipping details

		$shipping=array();
		$shipping['order_id']=$order_id;
		$shipping['ship_name']=$request->ship_name;
		$shipping['ship_email']=$request->ship_email;
		$shipping['ship_phone']=$request->ship_phone;
		$shipping['ship_address']=$request->ship_address;
		$shipping['ship_city']=$request->ship_city;
		DB::table('shipping')->insert($shipping);

		//insert data into orderdetails

		$content=Cart::content();
		$details=array();
		foreach ($content as $row) {
			$details['order_id']=$order_id;
			$details['product_id']=$row->id;
			$details['product_name']=$row->name;
			$details['color']=$row->options->color;
			$details['size']=$row->options->size;
			$details['quantity']=$row->qty;
			$details['singleprice']=$row->price;
			$details['totalprice']=$row->qty * $row->price;
			DB::table('order_details')->insert($details);
		}

		Cart::destroy();
		if(Session::has('coupon'))
		{
			Session::forget('coupon');
		}

		$notification=array('message'=>'Successfully Done','alert_type'=>'success');

		return Redirect()->to('/')->with($notification);

	}

	// public function SuccessList()
	// {
	// 	$order=DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','DESC')->limit(10)->get();
	// 	return view('pages.returnorder',compact('order'));
	// }

	// public function RequestReturn($id)
	// {
	// 	DB::table('orders')->where('id',$id)->update(['return_order']=>1);

	// 	$notification=array('message'=>'Order return request done, please wait for confirmation email','alert_type'=>'success');

	// 	return Redirect()->back()->with($notification);
	// }

}
