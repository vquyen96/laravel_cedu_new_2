<?php

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
Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
	Route::get('/','Admin\LoginController@getLogin');
	Route::post('/','Admin\LoginController@postLogin');
});
Route::group(['prefix' => 'register', 'middleware'=>'CheckLogedIn'], function(){
	Route::get('/','Frontend\HomeController@getRegister');
	Route::post('/','Frontend\HomeController@postRegister');
});
	

Route::get('logout','Admin\LoginController@getLogout');

Route::group(['namespace'=>'Admin', 'middleware'=>'CheckAdmin'],function(){
	
	
	Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
		Route::get('/','HomeController@getHome');
		Route::get('home_teacher','HomeController@getHomeTeacher');



		Route::get('user','HomeController@getUser');
		Route::post('user','HomeController@postUser');
		Route::group(['prefix'=>'account'],function(){
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
			Route::get('add','TeacherController@getAdd');
			Route::post('add','TeacherController@postAdd');
			Route::get('edit/{id}','TeacherController@getEdit');
			Route::post('edit/{id}','TeacherController@postEdit');
			Route::get('delete/{id}','TeacherController@getDelete');

			Route::get('active/{id}','TeacherController@getActive');
			Route::get('no/{id}','TeacherController@getNo');
			Route::get('detail/{id}','TeacherController@getDetail');
			Route::post('detail/{id}','TeacherController@postDetail');

			Route::get('detail/{tea}/addstory', 'TeacherController@getAddSto');
			Route::post('detail/{tea}/addstory', 'TeacherController@postAddSto');
			Route::get('detail/{tea}/editstory/{sto}', 'TeacherController@getEditSto');
			Route::post('detail/{tea}/editstory/{sto}', 'TeacherController@postEditSto');
			Route::get('detail/{tea}/deletestory/{sto}', 'TeacherController@getDeleteSto');
			
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
			Route::get('add','CourseController@getAdd');
			Route::post('add','CourseController@postAdd');
			Route::get('edit/{id}','CourseController@getEdit');
			Route::post('edit/{id}','CourseController@postEdit');
			Route::get('delete/{id}','CourseController@getDelete');
			Route::get('take_down/{id}','CourseController@getDown');
			Route::get('take_up/{id}','CourseController@getUp');
			//student
			Route::get('student/{id}', 'CourseController@getStudent');
			//part
			Route::get('detail/{id}','PartController@getPart');
			Route::post('detail/{id}','PartController@postPart');

			Route::group(['prefix'=>'part'],function(){
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

			Route::get('show/{group}','GroupDocController@getDoc');
			Route::post('show/{group}','GroupDocController@postDoc');
			Route::get('edit/{group}/{doc}','GroupDocController@getEditDoc');
			Route::post('edit/{group}/{doc}','GroupDocController@postEditDoc');
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
	});
});
Route::group(['namespace'=>'Frontend', 'middleware'=>'CORS'],function(){
	Route::get('code','CodeController@getActiveCode');
	Route::post('code','CodeController@postActiveCode');

	
	Route::post('loginHome','HomeController@postLogin');
	Route::get('/','HomeController@getHome');
	
	Route::post('get_course_home', 'HomeController@get_course_home');

	Route::get('share/{slug}','UserController@getShare');
	Route::post('acc_req','UserController@postAccReq');
	
	Route::group(['prefix'=>'user'], function(){
		Route::get('/','UserController@getUser');
		Route::post('/','UserController@postUser');

		// Route::get('dashboard', )

		Route::get('course_doing', 'UserController@getCourseDoing');
		Route::get('course_done', 'UserController@getCourseDone');

		Route::get('change_pass', 'UserController@getChangePass');
		Route::post('change_pass', 'UserController@postChangePass');

		
	});

	Route::group(['prefix' => 'aff', 'middleware' => 'CheckAff'], function(){
		Route::get('top','AffController@getTop');
		Route::get('history','AffController@getHistory');
		Route::get('dashboard', 'AffController@getDashboard');
		Route::get('share/{slug}','AffController@getShare');
	});



	Route::group(['prefix'=>'user_aff'], function(){
		Route::get('/','UserController@getUserAff');
	});
	
	Route::post('gift', 'GiftController@postGift');
	
	Route::get('/slide_home_head', 'BannerController@HomeHead');

	Route::get('affiliate', 'PartnerController@getAffiliate');
	Route::post('affiliate', 'PartnerController@postAffiliate');
	
	Route::get('doitacgiaovien', 'PartnerController@getGiaovien');
	Route::post('doitacgiaovien', 'PartnerController@postGiaovien');


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
		

	});
	Route::group(['prefix' => 'teacher'], function(){
		Route::get('/{email}','TeacherController@getTeacher');
		Route::get('/{email}/{rate}', 'TeacherController@getTeacherRating');
	});

	Route::group(['prefix'=>'forgot_pass'], function(){
		Route::get('/','ForgotPass@getPage');
		Route::post('/','ForgotPass@postPage');
		Route::get('email/{email}','ForgotPass@sendEmail');
		Route::post('email/{email}','ForgotPass@resetPass');
		
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
	Route::group(['prefix'=>'cart'],function(){
		Route::get('/','CartController@getPayment');
		Route::post('/','CartController@postPayment');

		Route::get('get_ngan_luong','CartController@getNganLuong');

		Route::get('add/{slug}','CartController@getAddCart');
		Route::get('buy/{slug}','CartController@getBuyNow');

		Route::get('show', 'CartController@getShowCart');
		Route::post('show', 'CartController@postComplete');

		Route::get('show', 'CartController@getShowCart');
		Route::post('show', 'CartController@postComplete');

		Route::get('delete/{id}', 'CartController@getDeleteCart');

		Route::get('login','CartController@getPaymentLogin');
		Route::post('login','CartController@postPaymentLogin');

		Route::get('complete/{type}','CartController@getComplete');
		Route::get('complete_nganluong', 'CartController@getCompleteNganLuong');
		Route::get('cancel', 'CartController@getCancelNganLuong');


		Route::get('complete_company', 'CartController@getEmailCompany');
		// Route::post('post_ngan_luong','CartController@postNganLuong');
	});

	Route::get('{slug}', 'HomeController@getToHome');





});
Route::group(['namespace'=>'Auth'],function(){
	Route::get('auth/facebook', 'AuthController@redirectToFacebook')->name('auth.facebook');
	Route::get('auth/facebook/callback', 'AuthController@handleFacebookCallback');
});
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');

Route::resource('payment','PaymentController');
Route::get('errors', 'ErrorsController@getError');
