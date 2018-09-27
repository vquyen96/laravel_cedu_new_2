<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\OrderDetail;
use App\Models\Aff;
use Auth;
class AffController extends Controller
{
    public function getList(){
    	if (Auth::user()->level != Account::ACCOUNTANT && Auth::user()->level != Account::MANAGING_AFF) {
    		$data['items'] = Account::where('level', Account::AFFILIATE)->orderBy('id','desc')->paginate(7);
    		return view('backend.affiliate',$data);
    	}
    	else{

    		$accs = Account::where('level', Account::AFFILIATE)->orderBy('id','desc')->paginate(7);
    		foreach ($accs as $acc){
    		    $acc->total_sale = $acc->sale->sum('total');
    		    $acc->total_profit = $acc->sale->sum('profit');
                $acc->total_student = $acc->sale->sum('cou');
            }
            $data['total_sale'] = $accs->sum('total_sale');
            $data['total_profit'] = $accs->sum('total_profit');
            $data['items'] = $accs;
    		return view('backend.accountant.aff',$data);
    	}
    	
    }
    public function getDetail($id){
    	$aff = Aff::where('aff_acc_id', $id)->first();
    	if ($aff == null) {
    		while (true) {
	            $code_value   = mt_rand(100000, 999999);
	            $codeExit = Aff::where('aff_code', $code_value)->first();
	            if($codeExit == null){
	                $aff = new Aff;
	                $aff->aff_code = $code_value;
	                $aff->aff_acc_id = $id;
	                $aff->save();
	                
	                break;
	            }
	        }
    	}
    	// return back();

    	$data['orderDe'] = OrderDetail::where('orderDe_aff_id', $id)->orderBy('created_at','desc')->get();
	    return view('backend.affiliate_detail', $data);
    }

    
    
}
