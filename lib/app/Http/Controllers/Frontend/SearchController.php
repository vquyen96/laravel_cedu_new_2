<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Account;
use App\Models\Teacher;
class SearchController extends Controller
{
    public function getList(Request $request){
    	$search = $request->search;
    	$data['searchValue'] = $search;
    	$course = Course::where('cou_status', 1)->where(function ($query) use ($search){
                $query->where('cou_name', 'like',  '%'.$search.'%')
                      ->orWhere('cou_content', 'like',  '%'.$search.'%');
                });
        // dd($course->get());
        $paramater = $request->all();
        // dd($paramater);
        $group = isset($request->group) ? $request->group : [];
        $gr_child = isset($request->gr_child) ? $request->gr_child : [];
        $price = isset($request->price) ? $request->price : [];
        $level = isset($request->level) ? $request->level : [];
        $type = isset($request->type) ? $request->type : [];
        
        

        if (count($gr_child)) {
            $course = $course->whereIn('cou_gr_id', $gr_child);
        }
        if (count($price)) {
            if (in_array(1, $price)) {
                $course = $course->orderBy('cou_price', 'asc');
            }
            else {
                $course = $course->orderByDesc('cou_price');
            }
            
        }
        if (count($level)) {
            $course = $course->whereIn('cou_level', $level);
        }
        if (count($group)) {

        	foreach ($group as $item) {
        		// dd($item);
        		// $grID = Group::find($item)->gr_id;
        		// dd($grID);
        		$list_gr_childs = Group::where('gr_parent_id', $item)->get();
        		foreach ($list_gr_childs as $list_gr_child) {
        			$list_gr_id[] = $list_gr_child->gr_id;
        		}

        		$list_gr_id[] = $item;
        	}
        	// dd($list_gr_id);
        	$course = $course->whereIn('cou_gr_id', $list_gr_id);
        }

        if (!$paramater) {
            $paramater = [
            	'search' => '',
                'course' => '1',
                'group' => [],
                'gr_child' => [],
                'price' => [],
                'level' => [],
                'type' => []
            ];
        }

       
        $data['paramater'] = $paramater;
        $data['group'] = $group;
        // $data['group_child'] = Group::where('gr_parent_id', $group->gr_id)->get();
        $data['courses'] = $course->paginate(5);
        
        $data['teacher'] = Teacher::orderBy('tea_featured','desc')->paginate(5);
        // dd($data);
        return view('frontend.course.all',$data);
    	
    	return view('frontend.course.all',$data);
    }
}
