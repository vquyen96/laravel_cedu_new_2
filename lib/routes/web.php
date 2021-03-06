<?php
use \Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix'=>'login','middleware'=>'CheckLogedOut'],function(){
	Route::get('/','Admin\LoginController@getLogin');
	Route::post('/','Admin\LoginController@postLogin');
});
Route::group(['prefix' => 'register', 'middleware'=>'CheckLogedOut'], function(){
	Route::get('/','Frontend\HomeController@getRegister');
	Route::post('/','Frontend\HomeController@postRegister');
});
	

Route::get('logout','Admin\LoginController@getLogout');

Route::group(['namespace'=>'Admin', 'middleware'=>'CheckAdmin'],function(){
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','HomeController@getHome');
		Route::get('home_teacher','HomeController@getHomeTeacher');



		Route::group(['prefix' => 'update'], function(){
			Route::get('course_student', 'UpdateController@course_student');
			Route::get('course_star', 'UpdateController@course_star');
			Route::get('course_video', 'UpdateController@course_video');
			Route::get('sale_teacher', 'UpdateController@sale_teacher');
			Route::get('sale_aff', 'UpdateController@sale_aff');

			Route::get('clone', 'UpdateController@clone');
		});
		Route::get('user','HomeController@getUser');
		Route::post('user','HomeController@postUser');

		Route::group(['prefix'=>'account', 'middleware'=>'CheckDetailAccount'],function(){
			Route::get('/','AccountController@getList');
			Route::get('search/','AccountController@getSearch');
			Route::get('add','AccountController@getAdd');
			Route::post('add','AccountController@postAdd');
			Route::get('edit/{id}','AccountController@getEdit');
			Route::post('edit/{id}','AccountController@postEdit');
			Route::get('delete/{id}','AccountController@getDelete');
		});
		Route::group(['prefix'=>'about'],function(){
			Route::get('/','AboutController@getList');
			Route::get('add','AboutController@getAdd');
			Route::post('add','AboutController@postAdd');
			Route::get('edit/{id}','AboutController@getEdit');
			Route::post('edit/{id}','AboutController@postEdit');
			Route::get('delete/{id}','AboutController@getDelete');
		});

		Route::group(['prefix'=>'affiliate'],function(){
			Route::get('/','AffController@getList');
			Route::get('detail/{id}','AffController@getDetail');
			Route::get('edit/{id}','AffController@getEdit');
			Route::post('edit/{id}','AffController@postEdit');
			Route::get('delete/{id}','AffController@getDelete');
		});
		Route::group(['prefix'=>'teacher'],function(){
			Route::get('/','TeacherController@getList');
			Route::get('add','TeacherController@getAdd')->middleware('CheckDetailTeacher');
			Route::post('add','TeacherController@postAdd')->middleware('CheckDetailTeacher');
			Route::get('edit/{id}','TeacherController@getEdit')->middleware('CheckDetailTeacher');
			Route::post('edit/{id}','TeacherController@postEdit')->middleware('CheckDetailTeacher');
			Route::get('delete/{id}','TeacherController@getDelete')->middleware('CheckDetailTeacher');

			Route::get('active/{id}','TeacherController@getActive')->middleware('CheckDetailTeacher');
			Route::get('no/{id}','TeacherController@getNo')->middleware('CheckDetailTeacher');
			Route::get('detail/{id}','TeacherController@getDetail')->middleware('CheckDetailTeacher');
			Route::post('detail/{id}','TeacherController@postDetail')->middleware('CheckDetailTeacher');

			Route::get('detail/{tea}/addstory', 'TeacherController@getAddSto')->middleware('CheckDetailTeacher');
			Route::post('detail/{tea}/addstory', 'TeacherController@postAddSto')->middleware('CheckDetailTeacher');
			Route::get('detail/{tea}/editstory/{sto}', 'TeacherController@getEditSto')->middleware('CheckDetailTeacher');
			Route::post('detail/{tea}/editstory/{sto}', 'TeacherController@postEditSto')->middleware('CheckDetailTeacher');
			Route::get('detail/{tea}/deletestory/{sto}', 'TeacherController@getDeleteSto')->middleware('CheckDetailTeacher');
			
		});
		Route::group(['prefix'=>'group'],function(){
			Route::get('/','GroupController@getList');
			Route::post('/','GroupController@postAdd');
			Route::get('edit/{id}','GroupController@getEdit');
			Route::post('edit/{id}','GroupController@postEdit');
			Route::get('delete/{id}','GroupController@getDelete');

			Route::get('detail/{id}', 'GroupController@getDetail');
			Route::post('detail/{id}', 'GroupController@postDetail');
		});
		Route::get('course_wait', 'CourseController@getListWait');
		Route::group(['prefix'=>'course'],function(){
			Route::get('/','CourseController@getList');
			Route::get('add','CourseController@getAdd')->middleware('CheckDetailCourse');
			Route::post('add','CourseController@postAdd')->middleware('CheckDetailCourse');
			Route::get('edit/{id}','CourseController@getEdit')->middleware('CheckDetailCourse');
			Route::post('edit/{id}','CourseController@postEdit')->middleware('CheckDetailCourse');
			Route::get('delete/{id}','CourseController@getDelete')->middleware('CheckDetailCourse');
			Route::get('take_down/{id}','CourseController@getDown')->middleware('CheckDetailCourse');
			Route::get('take_up/{id}','CourseController@getUp')->middleware('CheckDetailCourse');
			//student
			Route::get('student/{id}', 'CourseController@getStudent')->middleware('CheckDetailCourse');
			//part
			Route::get('detail/{id}','PartController@getPart')->middleware('CheckDetailCourse');
			Route::post('detail/{id}','PartController@postPart')->middleware('CheckDetailCourse');

			Route::group(['prefix'=>'part', 'middleware' => 'CheckDetailCourse'],function(){
				Route::get('edit/{cou_id}/{part_id}','PartController@getEdit');
				Route::post('edit/{cou_id}/{part_id}','PartController@postEdit');
				Route::get('delete/{id}','PartController@getDelete');
				//lesson
				Route::get('detail/{cou_id}/{part_id}','LessonController@getLesson');
				Route::post('detail/{cou_id}/{part_id}','LessonController@postLesson');

				Route::group(['prefix'=>'lesson'],function(){
					Route::get('edit/{cou_id}/{part_id}/{les_id}','LessonController@getEdit');
					Route::post('edit/{cou_id}/{part_id}/{les_id}','LessonController@postEdit');
					Route::get('delete/{id}','LessonController@getDelete');
				});
			});
		});
		Route::group(['prefix'=>'order'],function(){
			Route::get('/','OrderController@getList');
			Route::get('detail/{id}','OrderController@getDetail');
			Route::get('ship/{id}','OrderController@getShip');
			Route::get('done/{id}','OrderController@getDone');
			Route::get('deny/{id}','OrderController@getDeny');

			
		});
        Route::group(['prefix'=>'transfer'],function(){
            Route::get('/','OrderController@getTransfer');
            Route::get('active/{id}','OrderController@getTransferActive');
            Route::get('deny/{id}','OrderController@getTransferDeny');

        });

        Route::group(['prefix'=>'discount'],function(){
            Route::get('/','DiscountController@getList');
            Route::get('add','DiscountController@getAdd');
            Route::post('add','DiscountController@postAdd');
            Route::get('edit/{id}','DiscountController@getEdit');
            Route::post('edit/{id}','DiscountController@postEdit');
            Route::get('delete/{id}','DiscountController@getDelete');
        });

		Route::get('order_detail_teacher','OrderController@getOrderDetailTeacher');

		Route::group(['prefix'=>'comment'],function(){
			Route::get('/','CommentController@getList');
			
			Route::get('edit/{id}','CommentController@getEdit');
			Route::post('edit/{id}','CommentController@postEdit');
			Route::get('delete/{id}','CommentController@getDelete');
		});


		Route::group(['prefix'=>'rating'],function(){
			Route::get('/','RatingController@getListCou');
			Route::get('detail/{cou_id}','RatingController@getDetail');

			Route::post('add/{slug}','RatingController@postAdd');
			
			Route::get('update/{cou_id}','RatingController@getUpdate');
			Route::get('edit/{id}','RatingController@getEdit');
			Route::post('edit/{id}','RatingController@postEdit');
			Route::get('delete/{id}','RatingController@getDelete');
		});

		Route::group(['prefix'=>'news'],function(){
			Route::get('/','NewsController@getList');
			Route::get('add','NewsController@getAdd');
			Route::post('add','NewsController@postAdd');
			Route::get('edit/{id}','NewsController@getEdit');
			Route::post('edit/{id}','NewsController@postEdit');
			Route::get('delete/{id}','NewsController@getDelete');
		});
		Route::group(['prefix'=>'doc'],function(){
			Route::get('/','GroupDocController@getGroup');
			// Route::get('get_group/{group}','GroupDocController@getGroupDoc');
			// Route::post('get_group/{group}','GroupDocController@postGroupDoc');
			// Route::get('edit_group/{group}/{groupdoc}','GroupDocController@getEditGroupDoc');
			// Route::post('edit_group/{group}/{groupdoc}','GroupDocController@postEditGroupDoc');
			// Route::get('delete_group/{group}/{groupdoc}','GroupDocController@getDeleteGroupDoc');

			Route::get('add','GroupDocController@getAddDoc');
			Route::post('postadd','GroupDocController@postAddDoc');
			Route::get('show/{group}','GroupDocController@getDoc');
			Route::post('show/{group}','GroupDocController@postDoc');
			Route::get('edit/{id}','GroupDocController@getEditDoc');
			Route::post('postedit/{id}','GroupDocController@postEditDoc');
			Route::get('delete/{doc}','GroupDocController@getDeleteDoc');
		});
		Route::group(['prefix' => 'banner'],function(){
			Route::get('/', 'BannerController@getList');

			Route::get('add', 'BannerController@getAdd');
			Route::post('add', 'BannerController@postAdd');

			Route::get('edit/{id}', 'BannerController@getEdit');
			Route::post('edit/{id}', 'BannerController@postEdit');
			
			Route::get('delete/{id}', 'BannerController@getDelete');
		});
		Route::get('delete_order_old','OrderController@delete_order_old');
		Route::get('change_level','AccountController@change_level');

		Route::group(['prefix' => 'acc_req'], function(){
			Route::get('/' , 'AccReqController@getList');
			Route::post('/' , 'AccReqController@postReq');

			Route::get('accept/{id}','AccReqController@getAccept');
			Route::get('denied/{id}','AccReqController@getDenied');


		});

		Route::group(['prefix'=>'bank'],function(){
			Route::get('/','BankController@getList');
			Route::get('add','BankController@getAdd');
			Route::post('add','BankController@postAdd');
			Route::get('edit/{id}','BankController@getEdit');
			Route::post('edit/{id}','BankController@postEdit');
			Route::get('delete/{id}','BankController@getDelete');
		});

		Route::group(['prefix' => 'gift'],function(){
			Route::get('/' , 'GiftController@getList');
			Route::post('/' , 'GiftController@postGift');
		});
		Route::group(['prefix' => 'noti'], function(){
			Route::get('/', 'NotiController@getList');
			Route::post('/', 'NotiController@postAdd');
			Route::get('edit/{id}', 'NotiController@getEdit');
			Route::post('edit/{id}', 'NotiController@postEdit');
			Route::get('seen/{id}', 'NotiController@getSeen');
			Route::get('delete/{id}', 'NotiController@getDelete');
			
		});
        Route::group(['prefix' => 'website_info'],function(){
            Route::get('/','WebInfoController@index')->name('website_info');
            Route::post('/add_info','WebInfoController@add_info')->name('add_info');
            Route::post('/update_info','WebInfoController@update_info')->name('update_info');
            Route::get('/delete_info/{id}','WebInfoController@delete_info')->name('delete_info');
        });
	});
});


Route::group(['namespace'=>'Frontend'],function(){
	Route::get('code','CodeController@getActiveCode');
	Route::post('code','CodeController@postActiveCode');

    Route::get('get_email', 'HomeController@getEmail');
    Route::post('get_email', 'HomeController@postEmail');
	
	Route::post('loginHome','HomeController@postLogin');
	Route::get('/','HomeController@getHome')->middleware('CheckEmailAccount');
	
	Route::post('get_course_home', 'HomeController@get_course_home');
	Route::post('get_templace', 'HomeController@get_templace');


	Route::get('share/{slug}','UserController@getShare');
	Route::post('acc_req','UserController@postAccReq');
	
	Route::group(['prefix'=>'user', 'middleware' => 'CheckLogedIn'], function(){
		Route::get('/','UserController@getUser');
		Route::post('/','UserController@postUser');

		// Route::get('dashboard', )

		Route::get('course_doing', 'UserController@getCourseDoing');
		Route::get('course_done', 'UserController@getCourseDone');

		Route::get('change_pass', 'UserController@getChangePass');
		Route::post('change_pass', 'UserController@postChangePass');

		Route::get('history', 'UserController@getHistory');
        Route::post('list_orderdetail', 'UserController@list_orderdetail');

		
	});

	Route::group(['prefix' => 'aff', 'middleware' => 'CheckAff'], function(){
		Route::get('top','AffController@getTop');
		Route::get('history','AffController@getHistory');
		Route::get('dashboard', 'AffController@getDashboard');
		Route::get('share/{slug}','AffController@getShare');
		Route::post('acc_req','AffController@postReq')->middleware('CheckEmailAccount');
	});



	Route::group(['prefix'=>'user_aff'], function(){
		Route::get('/','UserController@getUserAff');
	});
	
	Route::post('gift', 'GiftController@postGift');
	
	Route::get('/slide_home_head', 'BannerController@HomeHead');

	Route::get('affiliate', 'PartnerController@getAffiliate');
	Route::post('affiliate', 'PartnerController@postAffiliate')->middleware('CheckEmailAccount');
	
	Route::get('doitacgiaovien', 'PartnerController@getGiaovien');
	Route::post('doitacgiaovien', 'PartnerController@postGiaovien')->middleware('CheckEmailAccount');


	Route::group(['prefix' => 'teacher', 'middleware' => 'CheckTeacher'], function(){
		Route::get('dashboard', 'TeacherController@getDashboard');
		Route::get('courses', 'TeacherController@getCourse');
		Route::get('courses/{slug}', 'TeacherController@getDetailCourse');
		Route::post('courses/{slug}', 'TeacherController@postDetailCourse');

		Route::get('profile', 'TeacherController@getProfile');
		Route::post('profile', 'TeacherController@postProfile');

		Route::get('add','TeacherController@getAddCourse');
		Route::post('add','TeacherController@postAddCourse');

		Route::post('part/{id}','TeacherController@postPart');
		Route::get('destroypart/{id}','TeacherController@destroyPart');
		Route::post('editpart/{id}','TeacherController@editPart');

		Route::get('destroylesson/{id}','TeacherController@destroyLesson');
		Route::post('video/{id}','TeacherController@postVideo');
		Route::post('editvideo/{id}','TeacherController@editVideo');

		Route::get('destroy_doc/{id}','TeacherController@destroyDoc');
		Route::post('doc/{cou_id}','TeacherController@postDoc');
		Route::post('editdoc/{id}','TeacherController@editDoc');

		// Route::post('group_child_from', 'TeacherController@get_group_child_form');
		Route::post('acc_req','TeacherController@postReq')->middleware('CheckEmailAccount');

	});
	Route::post('teacher/group_child_from', 'TeacherController@get_group_child_form');

	Route::group(['prefix' => 'teacher'], function(){
		Route::get('/{email}','TeacherController@getTeacher');
		Route::get('/{email}/{rate}', 'TeacherController@getTeacherRating');
	});

	Route::group(['prefix'=>'forgot_pass'], function(){
		Route::get('/','ForgotPass@getPage');
		Route::post('/','ForgotPass@postPage');
		Route::get('email/{email}/{code}','ForgotPass@sendEmail');
		Route::post('email/{email}/{code}','ForgotPass@resetPass');
		
	});
	Route::group(['prefix'=>'rating'],function(){
		Route::post('add/{slug}','RatingController@postAdd');
		Route::post('edit/{id}/{slug}','RatingController@postEdit');
	});
	Route::get('about/{slug}.html','HomeController@getAbout');
	
	Route::group(['prefix'=>'courses'],function(){
		Route::get('/','CourseController@getList');
		Route::get('/{slug}','CourseController@getGroup');
		Route::get('/{slug}/all','CourseController@getAll');
		Route::get('detail/{slug}.html','CourseController@getDetail');
		Route::get('detail/{slug}.html/video/{id}','CourseController@getVideo');
		Route::get('detail/{slug}.html/teacher','CourseController@getTeacher');
		Route::get('detail/{slug}.html/active','CourseController@getActive');

		Route::post('rate', 'CourseController@postRate');
		Route::post('time_lession/update_time_les', 'CourseController@update_time_les')->name('update_time_les');
		Route::post('get_aff', 'CourseController@get_aff');
        Route::post('get_leaning', 'CourseController@getLearning');
	});


	Route::group(['prefix'=>'account'],function(){
		Route::get('/','CourseController@getAccount');
		Route::get('detail/{slug}.html','CourseController@getDetail');
	});
	// Route::group(['prefix'=>'group'],function(){
	// 	Route::get('/{slug}.html','CourseController@getGroup');
	// });
	Route::group(['prefix'=>'news'],function(){
		Route::get('/','NewsController@getList');
		Route::get('detail/{slug}','NewsController@getDetail');
		Route::get('tag/{slug}', 'NewsController@getTag');
	});
	Route::group(['prefix'=>'doc'],function(){
		Route::get('/','DocController@getList');
		// Route::get('detail/{gr_slug}','DocController@getGroup');
		Route::get('/{gr_slug}','DocController@getDoc');
	});
	Route::group(['prefix'=>'partner'],function(){
		Route::get('/','PartnerController@getList');
		Route::get('detail/{slug}','PartnerController@getDetail');
	});

	Route::group(['prefix'=>'search'],function(){
		Route::get('/','SearchController@getList');
	});
	// Route::group(['prefix'=>'cart'],function(){
	// 	Route::get('add/{slug}','CartController@getAddCart');
	// 	Route::get('buy/{slug}','CartController@getBuyNow');

	// 	Route::get('show', 'CartController@getShowCart');
	// 	Route::post('show', 'CartController@postComplete');

	// 	Route::get('delete/{id}', 'CartController@getDeleteCart');
	// 	Route::get('update', 'CartController@getUpdateCart');
		
	// 	Route::get('complete/{type}', 'CartController@getComplete');

	// });
	Route::get('noti_seen/{id}', 'NotiControlle@getSeen');

	Route::group(['prefix'=>'cart', 'middleware'=>'CheckEmailAccount'],function(){
		Route::get('/','CartController@getPayment');
		Route::post('/','CartController@postPayment');

		Route::get('get_ngan_luong','CartController@getNganLuong');

		Route::get('add/{slug}.html','CartController@getAddCart');
		Route::get('buy/{slug}.html','CartController@getBuyNow');

		Route::get('show', 'CartController@getShowCart');
//		Route::post('show', 'CartController@postComplete');

		Route::get('delete/{id}', 'CartController@getDeleteCart');

		Route::get('login','CartController@getPaymentLogin');
		Route::post('login','CartController@postPaymentLogin');

		Route::get('complete/{type}','CartController@getComplete');
		Route::get('complete_nganluong', 'CartController@getCompleteNganLuong');
		Route::get('cancel', 'CartController@getCancelNganLuong');

		Route::post('transfer', 'CartController@postTranfer');
		Route::get('info/{ord_id}', 'CartController@infoTransfer');

		Route::get('complete_company', 'CartController@getEmailCompany');
		// Route::post('post_ngan_luong','CartController@postNganLuong');

        Route::post('update_status', 'CartController@update_status');
        Route::post('check_status', 'CartController@check_status');
        Route::post('update_transfer', 'CartController@update_transfer');
        Route::get('complete', 'CartController@getCompleteNew');

        Route::post('update_dis', 'CartController@update_dis');

	});

	Route::get('{slug}', 'HomeController@getToHome');
	Route::post('check_discount', 'DiscountController@check_discount');





});
// Route::group(['namespace'=>'Auth'],function(){
// 	Route::get('auth/facebook', 'AuthController@redirectToFacebook')->name('auth.facebook');
// 	Route::get('auth/facebook/callback', 'AuthController@handleFacebookCallback');
// });
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');



Route::group(['prefix'=>'auth','middleware'=>'CheckLogedOut'],function(){
    Route::get('/{provider}', 'SocialAuthController@redirectToProvider');
    Route::get('/{provide}/callback', 'SocialAuthController@handleProviderCallback');
});


Route::resource('payment','PaymentController');
Route::get('errors', 'ErrorsController@getError');


Route::get('/player/run', function () {

    $video = asset('video/[Offical MV] Đưa nhau đi trốn - Đen ft. Linh Cáo (Prod. by Suicidal illness).mp4');
    $mime = "video/mp4";
    $title = "Os Simpsons";
    return view('resources_views_player')->with(compact('video', 'mime', 'title'));
});
Route::get('/video/{filename}', function ($filename) {
    // Pasta dos videos.
    $videosDir = base_path('public/uploads/');
    if (file_exists($filePath = $videosDir."/".$filename)) {
        $stream = new \App\Http\VideoStream($filePath);
        return response()->stream(function() use ($stream) {
            $stream->start();
        });
    }
    return response("File doesn't exists", 404);
});
