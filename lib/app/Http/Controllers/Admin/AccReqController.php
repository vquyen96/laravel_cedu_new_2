<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account_Request;
use DateTime;
use Auth;
use Mail;
class AccReqController extends Controller
{
	public function getList(){
		$data['items'] = Account_Request::orderBy('created_at','desc')->get();
		return view('backend.acc_req', $data);
	}

	public function postReq(Request $request){
		$acc_req = Account_Request::where('req_acc_id', $request->acc_id)->orderBy('created_at','desc')->first();
		$date = new DateTime();
		$date = strtotime(date_format($date,"Y-m-d h:m:s"));
		$time = 0;
		if ($acc_req != null) {
			
			$time = strtotime(date_format($acc_req->created_at,"Y-m-d h:m:s"));
		}
		
		if ($time < $date-(86400*10) || $acc_req == null) {
			$acc_req = new Account_Request;
			$acc_req->req_status = 1;
			$acc_req->req_acc_id = $request->acc_id;
			$acc_req->req_amount = $request->amount;
			$acc_req->save();
			sleep(1);
			$email = Auth::user()->email;
			$data['acc_req'] = $acc_req;
			Mail::send('frontend.emailAccountRequest', $data, function($message) use ($email){
                $message->from('info@ceduvn.com', 'Ceduvn');
                $message->to($email, $email);
                $message->subject('Thư thông báo rút tiền CEDU');
            });
			return back()->with('success', 'Gửi yêu cầu rút tiền thành công');
		}
		else{

			return back()->with('error', 'Bạn đã gửi yêu cầu rút tiền rồi');
		}

			
	}

	public function getAccept($id_acc_req){
		$acc_req = Account_Request::find($id_acc_req);
		$acc_req->req_status = 0;
		$acc_req->save();
		return back();
	}
	public function getDenied($id_acc_req){
		$acc_req = Account_Request::find($id_acc_req);
		$acc_req->req_status = -1;
		$acc_req->save();
		return  back();
	}

}
