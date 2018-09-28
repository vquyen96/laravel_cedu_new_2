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
    public function getList(Request $request){
        $group_id = $request->group;
        if (isset($group_id) &&  $group_id != 0) {
            $data['document'] = Doc::orderByDesc('doc_id')->where('doc_gr_id',$group_id)->whereNull('doc_cou_id')->paginate(15);
            $data['group_id'] = $group_id;
        }
        else{
            $data['document'] = Doc::orderByDesc('doc_id')->whereNull('doc_cou_id')->paginate(15);
            $data['group_id'] = '';
        }
        return view('frontend.document.document',$data);
    	
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
