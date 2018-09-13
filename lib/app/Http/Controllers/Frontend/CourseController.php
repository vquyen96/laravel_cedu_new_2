<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Account;
use App\Models\Code;
use App\Models\Rating;
use App\Models\Teacher;
use App\Models\Doc;
use \App\Models\Leaning;
use \Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{
    public function getList(Request $request){
        return redirect('search');
        if (($request->price != null && $request->price != "null") || ($request->level != null && $request->level != "null") || ($request->tag != null && $request->tag != "null")) {
            if($request->price != null && $request->price != "null"){
                $price = (int)$request->price;
            }
            else{
                $price = 10000000;
            }
            if($request->tag != null && $request->tag != "null"){
                $tag = $request->tag;
            }
            else{
                
                $tag = "";
            }
            if($request->level != null && $request->level != "null"){
                $level = $request->level;
            }
            else{
                
                $level = "all";
            }
            $data['course'] = Course::where('cou_status', '1')->get();
            $data['courseByMost'] = Course::where('cou_price','<', $price)->where('cou_tag', 'like', '%'.$tag.'%')->where('cou_level', $level)->orderBy('cou_student','desc')->where('cou_status', '1')->paginate(6);
            $data['courseNewMost'] = Course::where('cou_price','<', $price)->where('cou_tag', 'like', '%'.$tag.'%')->where('cou_level', $level)->orderBy('created_at','desc')->where('cou_status', '1')->paginate(6);
            $data['courseVoteMost'] = Course::where('cou_price','<', $price)->where('cou_tag', 'like', '%'.$tag.'%')->where('cou_level', $level)->orderBy('cou_star','desc')->where('cou_status', '1')->paginate(6);
            $data['courseSaleMost'] = Course::where('cou_price','<', $price)->where('cou_tag', 'like', '%'.$tag.'%')->where('cou_level', $level)->orderBy('cou_sale','desc')->where('cou_status', '1')->paginate(6);

            $data['teacher'] = Teacher::orderBy('tea_featured','desc')->paginate(7);
            $data['teacher_total'] = Teacher::count();
            
            // dd($data['teacher']);
            return view('frontend/course',$data);
        }
        $data['course'] = Course::where('cou_status', '1')->get();
    	$data['courseByMost'] = Course::orderBy('cou_student','desc')->where('cou_status', '1')->paginate(15);
        $data['courseNewMost'] = Course::orderBy('created_at','desc')->where('cou_status', '1')->paginate(15);
        $data['courseVoteMost'] = Course::orderBy('cou_star','desc')->where('cou_status', '1')->paginate(15);
        $data['courseSaleMost'] = Course::orderBy('cou_sale','desc')->where('cou_status', '1')->paginate(15);

    	$data['teacher'] = Teacher::orderBy('tea_featured','desc')->paginate(7);
        $data['teacher_total'] = Teacher::count();
        
    	return view('frontend/course',$data);
    }
    public function getDetail($slug){
        if (Auth::check() && Auth::user()->level == 8) {
            return redirect('aff/share/'.$slug);
        }
    	$data['course'] = Course::where('cou_slug',$slug)->first();
        $course_relate = $data['course']->group->course;

        $list_cou_ids = [];
        foreach ($course_relate as $item) {
            if ($data['course']->cou_id != $item->cou_id) {
                $list_cou_ids[] = $item->cou_id;
            }
            
        }

        $data['course_relate'] = Course::whereIn('cou_id', $list_cou_ids)->inRandomOrder()->take(3)->get();

        // dd($data['course_relate']);
        if ($data['course']->cou_status == 1) {
            if(Auth::check()){
                $data['acc'] = Account::where('id', Auth::user()->id)->where('level', 8)->first();
                $orderDe_id = 0;
                $code = 0;
                foreach ($data['course']->orderDe as $item) {
                    if ($item->order != null && $item->order->ord_acc_id == Auth::user()->id) {
                        $orderDe_id = $item->orderDe_id;
                    }
                }
                if ($orderDe_id != null) {
                    $code = Code::where('code_orderDe_id',$orderDe_id)->first();
                }
                
                if($code != null){
                    if($code->code_status == 1){
                        return redirect('courses/detail/'.$slug.'.html/active');
                    }
                    else{
                        return view('frontend.course.detail',$data)->with('error','Bạn chưa kích hoạt khóa học này');
                    }
                }
                else{
                    return view('frontend.course.detail',$data);
                }
            }
            else{
                return view('frontend.course.detail',$data);
            }
        }
        else{
            return back()->with('error','Khóa học của chúng tôi đang trong quá trình bảo trì');
        }
            
    	
    }
    public function getGroup($slug){
    	$group = Group::where('gr_slug', $slug)->first();
    	$groupId = $group->gr_id;
        if ($group->gr_parent_id == 0) {
            $list_gr = Group::where('gr_parent_id', $groupId)->get(['gr_id'])->toArray();
            $list_gr[] = $groupId;
            // $list_gr = array_column(json_decode(json_encode($list_gr),true),'gr_id');
        }
        else{
            $list_gr = [$groupId];
        }

    	$data['group'] = $group;
        $data['group_child'] = Group::where('gr_parent_id', $group->gr_id)->get();
    	$course = Course::whereIn('cou_gr_id',$list_gr)->where('cou_status', '1');

        $data['courseByMost'] = Course::whereIn('cou_gr_id',$list_gr)->where('cou_status', '1')->orderBy('cou_student','desc')->take(10)->get();
        $data['courseNewMost'] = Course::whereIn('cou_gr_id',$list_gr)->where('cou_status', '1')->orderBy('created_at','desc')->take(10)->get();
        $data['courseVoteMost'] = Course::whereIn('cou_gr_id',$list_gr)->where('cou_status', '1')->orderBy('cou_star','desc')->take(10)->get();
        // dd($data['courseVoteMost']);
        $data['courseSaleMost'] = $course->orderBy('cou_sale','desc')->take(10)->get();
    	$data['teacher'] = Teacher::orderBy('tea_featured','desc')->paginate(10);
        // $data['teacher_total'] = Teacher::count();
        // dd($data['courseVoteMost']);
    	return view('frontend.course.group',$data);
    }
    public function getAll(Request $request, $slug){

        $group = Group::where('gr_slug', $slug)->first();
        $groupId = $group->gr_id;
        if ($group->gr_parent_id == 0) {
            $list_gr = Group::where('gr_parent_id', $groupId)->get(['gr_id'])->toArray();
            $list_gr[] = $groupId;
            // $list_gr = array_column(json_decode(json_encode($list_gr),true),'gr_id');
        }
        else{
            $list_gr = [$groupId];
        }


        $course = Course::where('cou_status', 1)->whereIn('cou_gr_id',$list_gr);
        // dd($course->get());
        $paramater = $request->all();
        // dd($paramater);
        // $group = isset($request->group) ? $request->group : [];
        $gr_child = isset($request->gr_child) ? $request->gr_child : [];
        $price = isset($request->price) ? $request->price : [];
        $level = isset($request->level) ? $request->level : [];
        $type = isset($request->type) ? $request->type : [];
        // dd($request->all());
        

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

        switch ($request->course) {
            case '1':
                $course = $course->orderByDesc('updated_at');
                break;
            case '2':
                $course = $course->orderByDesc('cou_student');
                break;
            case '3':
                $course = $course->orderByDesc('cou_star');
                break;
            
            default:
                # code...
                break;
        }

        if (!$paramater) {
            $paramater = [
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
        $data['group_child'] = Group::where('gr_parent_id', $group->gr_id)->get();
        $data['courses'] = $course->paginate(10);
        
        $data['teacher'] = Teacher::orderBy('tea_featured','desc')->paginate(10);
        // dd($data);
        return view('frontend.course.all',$data);
    }

    public function getVideo($slug, $id){
        $data['course'] = Course::where('cou_slug',$slug)->first();
        $user = Auth::user();
        if(Auth::check()){
            $acc = Account::where('id',Auth::user()->id)->first();
            $orderDe_id = null;
            foreach ($data['course']->orderDe as $item) {
                if ($item->order->ord_acc_id == Auth::user()->id) {
                    $orderDe_id = $item->orderDe_id;
                }
            }
            
            $code = Code::where('code_orderDe_id',$orderDe_id)->first();
            if($code != null){
                if($code->code_status == 1){
                    // $data['course'] = Course::where('cou_slug',$slug)->first();
                    $data['part'] = $data['course']->part;
                    $index_video = 0;
                    foreach ($data['part'] as $part) {
                        // dd($part->lesson);
                        foreach ($part->lesson as $lesson) {

                            $check = DB::table('leaning')->where('account_id',$user->id)->where('lesson_id',$lesson->les_id)->first();
                            if($check) $lesson->check = $check->status;
                            else $lesson->check = 1;
                            $data['listVideo'][$index_video] = $lesson;
                            $index_video++;

                        }
                        
                    }
                    // dd($data['listVideo']);
                    if ($id < 0 || $id >= count($data['listVideo'])) {
                        return redirect('/')->with('error', 'Bài học không tồn tại');
                    }
                    else{

                        $data['video'] = $data['listVideo'][$id];
                        
                    }

                    $leaning = DB::table('leaning')->where('account_id',$user->id)->where('lesson_id',$data['listVideo'][$id]->les_id)->first();

                    $data['leaning'] = $leaning;

                    $data['doc'] = Doc::where('doc_cou_id', $data['course']->id)->get();
                    return view('frontend.course.video',$data);
                }
                else{
                    return redirect('courses/detail/'.$slug.'.html')->with('error','Bạn chưa kích hoạt khóa học này');
                }
            }
            else{
                return redirect('courses/detail/'.$slug.'.html');
            }
        }
        else{
            return redirect('courses/detail/'.$slug.'.html');
        }

                    
    }

    function update_time_les(Request $request){
        $req = $request->all();
        $user = Auth::user();

        $lesson = DB::table('lesson')->where('les_id',$req['les_id'])->first();

        if($lesson){
            $leaning = DB::table('leaning')->where('account_id',$user->id)->where('lesson_id',$req['les_id'])->first();

            if($req['current_time'] == $lesson->les_video_duration) $status = 2;
            else $status = 1;
            if($leaning){
//                dd(DB::table('leaning')->where('account_id',$user->id)->where('lesson_id',$req['les_id'])->update(['updated_at' => time(),'time_in_video' => $req['current_time'],'status' => $status]));
                DB::table('leaning')->where('account_id',$user->id)->where('lesson_id',$req['les_id'])->update(['updated_at' => time(),'time_in_video' => $req['current_time'],'status' => $status]);
            }else {
                $data = [
                    'account_id' => $user->id,
                    'lesson_id' => $req['les_id'],
                    'created_at' => time(),
                    'updated_at' => time(),
                    'time_in_video' => $req['current_time'],
                    'status' => $status
                ];
                Leaning::create($data);
            }
        }

        return json_encode([
            'status' => 1
        ]);
    }

    public function getTeacher($slug){
        $course = Course::where('cou_slug',$slug)->first();
        $data['teacher'] = $course->tea;
        return view('frontend.teacher',$data);
    }

    public function getActive($slug){
        if(Auth::check()){

            $cou = Course::where('cou_slug',$slug)->first();

            if ($cou->cou_status == 1) {
                foreach ($cou->orderDe as $item) {
                    if ($item->order->ord_acc_id == Auth::user()->id) {
                        $orderDe_id = $item->orderDe_id;
                    }
                }

                $code = Code::where('code_orderDe_id',$orderDe_id)->first();
                if($code != null){
                    if($code->code_status == 1){

                        $course_relate = $cou->group->course;
                        $list_cou_ids = [];
                        foreach ($course_relate as $item) {
                            if ($cou->cou_id != $item->cou_id) {
                                $list_cou_ids[] = $item->cou_id;
                            }
                            
                        }

                        $data['course_relate'] = Course::whereIn('cou_id', $list_cou_ids)->inRandomOrder()->take(3)->get();
                        $data['course'] = $cou;
                        // $data['rat'] = Rating::where('rat_cou_id',$cou->cou_id)->where('rat_acc_id',Auth::user()->id)->first();
                        
                        $data['active'] = true;
                        return view('frontend.course.detail',$data);
                    }
                    else{
                        return redirect('courses/detail/'.$slug.'.html')->with('error','Bạn chưa kích hoạt khóa học này');
                    }
                }
                else{
                    return redirect('courses/detail/'.$slug.'.html')->with('error','Bạn đã cố gắng');
                }
            }
            else{
                return back()->with('error','Khóa học của chúng tôi đang trong quá trình bảo trì');
            }   
                
        }
        else{
            return redirect('courses/detail/'.$slug.'.html')->with('error','Bạn phải đăng nhập');
        }
            
    }
    public function postRate(){
        $star = (int)Input::get('star');
        $content = Input::get('content');
        $cou_id = Input::get('cou_id');
        if (Auth::check()) {
            $rate = Rating::where('rat_acc_id' , Auth::user()->id)->where('rat_cou_id', $cou_id)->first();
            isset($rate) ? '' : $rate = new Rating;
            $rate->rat_star = $star;
            $rate->rat_content = $content;
            $rate->rat_acc_id = Auth::user()->id;
            $rate->rat_cou_id = $cou_id;
            $rate->save();
            $this->reloadRate($cou_id);
            return response('ok', 200);
        }
        else{
            return response('error', 501);
        }   
            
    }
       
}

