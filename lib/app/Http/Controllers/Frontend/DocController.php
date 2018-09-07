<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupDoc;
use App\Models\Doc;
use App\Models\Banner;

use Auth;

class DocController extends Controller
{
    public function getList(){
        $data['document'] = Doc::orderBy('doc_id','asc')->paginate(15);
        // $gr_slug = Group::first()->gr_slug;
        // return redirect('doc/'.$gr_slug);
        return view('frontend.document.document',$data);
    	// $data['group'] = Group::all();
     //    $data['bannerHead'] = Banner::where('ban_name','like','Banner Tài Liệu_Phía Trên')->get();

    	// return view('frontend.doc',$data);
    }
    // public function getGroup($gr_slug){
    //     $group = Group::where('gr_slug',$gr_slug)->first();
    //     $grdoc_slug = GroupDoc::where('grdoc_gr_id',$group->gr_id)->first();
    //     if ($grdoc_slug != null && $grdoc_slug != "") {
    //         return redirect('doc/detail/'.$gr_slug.'/'.$grdoc_slug->grdoc_slug);
    //     }
    //     else{
    //         return redirect('errors');
    //     }
    // }
    public function getDoc($gr_slug){
        $data['bannerHead'] = Banner::where('ban_name','like','Banner Tài Liệu_Phía Trên')->get();

    	$group = Group::where('gr_slug',$gr_slug)->first();
        if ($group == null) {
            return redirect('errors');
        }
        else{
            $data['doc'] = Doc::where('doc_gr_id', $group->gr_id)->get();
        }

    	// if ($grdoc_slug == 'all') {
    	// 	$grdoc = GroupDoc::where('grdoc_gr_id',$group->gr_id)->get();
    	// 	$data['doc_list']=array();
    	// 	$count = 0;
    	// 	for($i = 0; $i < $grdoc->count(); $i++){
    	// 		for($j = 0; $j < $grdoc[$i]->doc->count(); $j++){
    	// 			array_push($data['doc_list'],$grdoc[$i]->doc[$j]);
    	// 		}
    	// 	}
    	// }
    	// else{
    	// 	$grdoc = GroupDoc::where('grdoc_slug',$grdoc_slug)->first();
    	// 	$data['doc_list'] = Doc::where('doc_grdoc_id', $grdoc->grdoc_id)->get();
    	// }
    	// $data['gr_name'] = $group->gr_name;
    	// $data['grdoc_list'] = GroupDoc::where('grdoc_gr_id',$group->gr_id)->get();
    	
    	return view('frontend.doc',$data);
    }

}
