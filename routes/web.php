<?php

use App\Payments;
use App\Faculties;
use Illuminate\Http\Request;


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

Route::get("autocomplete/videos", "VideoController@autoComplete")->name('subjects');

Route::get('/', function () {
    return view('index');
});
Route::get("about-us", function () {
    return view('our_story');
});

Route::get("pricing", function () {
    return view('pricing');
});;
Route::get("contact-us", function () {
    return view('contact');
});

Route::get("send-mail", function () {
    return view('sendclientmail');
});


Route::get("payment", function () {
    if (Auth::check()) {
        # code...

        $plan = $_GET['plan'];
        $plan_cost = $_GET['plan_cost'];

        return view('payment')
            ->with('plan', $plan)
            ->with('plan_cost', $plan_cost);
    } else {
        return redirect()->to('login')->with('errmsg', 'Please login to continue.');
    }
});

Route::post("payment/billing", function (Request $request) {


    $plan = $request->get('plan');
    $plan_cost = $request->get('plan_cost');

    if (Auth::check()) {
        $date = \Carbon\Carbon::now(); // 2019-03-12
        $date =  $date->addMonth(1);
        $expiry_date = \Carbon\Carbon::parse($date)->format("Y-m-d m:s");

        // if (Payments::where('student_email', Auth::user()->email)->exists()){
        //     Payments::where('student_email', Auth::user()->email)->update([
        //         'sub_plan' => $plan,
        //         'amount' => $plan_cost,
        //         'flw_ref' => $request->get('flw_ref'),
        //         'transaction_id' => $request->get('transaction_id'),
        //         'tx_ref' => $request->get('tx_ref'),
        //         'currency' => $request->get('currency'),
        //         'expiry_date' => $expiry_date,
        //         'student_email' => $request->get('email')
        //     ]);
        // }else{
        \App\Payments::create([
            'sub_plan' => $plan,
            'amount' => $plan_cost,
            'flw_ref' => $request->get('flw_ref'),
            'transaction_id' => $request->get('transaction_id'),
            'tx_ref' => $request->get('tx_ref'),
            'currency' => $request->get('currency'),
            'expiry_date' => $expiry_date,
            'student_email' => $request->get('email')
        ]);

        // }

    } else {
        return redirect()->to('login')->with('errmsg', 'Please login to continue.');
    }
});

Route::get("terms-and-conditions", function () {
    return view('termsandconditions');
});
Route::post('send-client-email', function (\Illuminate\Http\Request $request) {
    $email = "info@acadazone.com";
    $data = array('body' => $request->get('emailbody'));
    Mail::send('contactemail', $data, function ($message) use ($email) {
        $message->to($email)
            ->subject('Email from Client');
        //            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
        $message->from('no-reply@acadazone.com', 'Acadazone');
    });
    return redirect()->back()->with('msg', "Message Sent");
});


Route::get("/links", "StudentsController@links")->name('show-indo');
Route::get("/signup-tutorial", "StudentsController@signUpTutorial");

Route::get('/profile-pic', 'InstructorsController@updatePics');
Route::get('/profile/updates/{verify_code}', 'RegistrationController@updateProfile');
Route::get('/email/verify', 'RegistrationController@emailVerify');
Route::get('/enter-email', 'RegistrationController@showEmail');
Route::post('/forget-password', 'RegistrationController@forgetPassword');
Route::get('/reset-password/{id}', 'RegistrationController@resetPassword');
Route::post('/register/email', 'RegistrationController@registerEmail');
Route::post('/verify-code', 'RegistrationController@verifyCode');

Route::get('/show-info', "RegistrationController@resendEmail");
Route::get('/resend-email-password-reset', "RegistrationController@resendPasswordReset");
Route::get('/resend-email', "RegistrationController@resendEmail");
Route::post('/change-password', 'RegistrationController@changePassword');
Route::patch("change-password", "AdminController@updatePassword")->name('update-password');


//Auth::routes(['verify' => true]);


Route::post("user/signup", "RegistrationController@signup");
Route::get("signup/form", "RegistrationController@signupForm");
Route::get("profile-update", "RegistrationController@profileUpdate");
Route::group(['prefix' => 'student'], function () {
    Route::post("/login", "LoginController@checkStudentCredentials");
});

/*--------------------------------------------------------Instructors----------------------------------------------*/
Route::get("instructor/login", "LoginController@instructorLogin");
Route::post("instructor/login", "LoginController@checkInstructorCredentials");

Route::get("instructor/profile-update", "LoginController@profileUpdate");
Route::get("/student", "StudentsController@profiles");


Route::get("instructor/login", "LoginController@instructorLogin");
Route::post("instructor/login", "LoginController@checkInstructorCredentials");

Route::group(['prefix' => 'instructor', 'as' => 'instructor.'], function () {
    Route::get("/dashboard", "InstructorsController@dashboard");
    Route::post("/store-video", "VideoController@upload")->name('store-video');
    Route::get("/videos", "VideoController@index")->name('videos');
    Route::get("/university/videos", "VideoController@videos")->name('videos');
    Route::get("/secondary-school/videos", "InstructorsController@secVideos")->name('videos');
    Route::get("/other-institutions/videos", "VideoController@otherInsVideo")->name('videos');
    Route::get("/video/{id}", "VideoController@show")->name('video');
    Route::get("/video/edit/{id}", "VideoController@edit")->name('video');
    Route::get("/logout", "InstructorsController@logout")->name('logout');
    Route::get("/profile-update", "InstructorsController@profileUpdated")->name('profile-update');
    Route::get("/profile", "InstructorsController@profile")->name('profile');
    Route::get("change-password", "InstructorsController@showPassword")->name('change-password');
    Route::get("upload-sec-video", "InstructorsController@uploadSecVidoes")->name('upload-sec-video');
    Route::get("Secondary-School-videos", "InstructorsController@secVideos")->name('sec-videos');
    Route::get("upload-video", "InstructorsController@uploadVideo")->name('upload.video');
    Route::get("university/upload-video", "VideoController@create")->name('create');
    Route::get("other-institutions/upload-video", "VideoController@otherInstitutions")->name('create');
    Route::patch("change-password", "InstructorsController@updatePassword")->name('change-password');
});

/*--------------------------------------------------------Students----------------------------------------------*/
Route::get("/login", "StudentsController@login")->name('login');
Route::get("student/video/{id}", "StudentsController@video")->name('video');



Route::group(['prefix' => 'student',  'as' => 'student.', 'middleware'  => ['StudentRole']], function () {
    Route::get("/logout", "StudentsController@logout")->name('logout');
    Route::get("/dashboard", "StudentsController@dashboard")->name('dashboard');
    Route::get("/videos", "StudentsController@videos")->name('videos');
    Route::get("/trending", "VideoController@trending")->name('trending');
    Route::get("/subscriptions", "VideoController@subscriptions")->name('subscriptions');
    Route::get("/history", "VideoController@history")->name('history');
    Route::get("/recent-videos", "VideoController@likedVideos")->name('recent-videos');
    Route::get("/results", "VideoController@searchedVideos")->name('results');
    Route::get("/profile", "StudentsController@profile")->name('profile');
    Route::get("change-password", "StudentsController@showPassword")->name('change-password');
    Route::get("/profile-pic", "StudentsController@profilePics")->name('show-profile-pics');
    Route::get("/show-info", "StudentsController@info")->name('show-indo');
    Route::get("/assignment/view/{i}", "StudentsController@info")->name('show-indo');
});





/*-------------------------------------------------------Admin------------------------------------------------------*/
Route::get("user/admin", "LoginController@adminLogin");
Route::get("admin/login", "LoginController@checkAdminCredentials");

Route::group(['prefix' => 'admin', 'middleware' => ['AdminRole'], 'as' => 'admin.'], function () {
    Route::get("dashboard", "AdminController@dashboard")->name('dashboard');
    Route::get("get-video", "AdminController@getVideo")->name("get-video");
    Route::get("create-school", "AdminController@createSchool")->name('create-school');
    Route::get("payments", "AdminController@payments")->name('payments');
    Route::get("change-password", "AdminController@showPassword")->name('change-password');
    Route::get("logout", "AdminController@logout")->name('logout');
    Route::get("videos", "AdminController@videos")->name('videos');
    Route::get("/video/{id}", "AdminController@showVideo")->name('video');
    Route::get("/sec-videos", "AdminController@secVideos")->name('sec-videos');
    Route::get("/create-others", "AdminController@createOthers")->name('others.create');
    Route::post("/create-other-institution-courses", "AdminController@createOtherInstitutionCourses")->name('others.create.schools');
    Route::get("update-others", "AdminController@updateOthers");
    Route::get("institutions", "AdminController@institutions")->name("institutions");
    Route::get("institution", "AdminController@institution")->name("institution");
    Route::get("/other-course/delete/{i}", "AdminController@deleteCourse");
    Route::patch("institution/update/{id}", "AdminController@updateInstitution");
    Route::patch("institution/course/update/{id}", "AdminController@updateCourse");
    Route::patch("institution/topic/update/{id}", "AdminController@updateTopic");
    Route::get("institution/courses/{id}", "AdminController@institutionCourses")->name("institution.courses");
    Route::get("institution/topic/{id}", "AdminController@institutionTopic")->name("institution.topic");
    Route::get("institutions/panel", "AdminController@otherInstitutionPanel")->name("institution.panel");
    Route::get("university/panel", "AdminController@universityPanel")->name("university.panel");
    Route::post("create-topic", "AdminController@createInstitutionTopic")->name("institution.topic.create");
    Route::get("videos/delete/{i}", "AdminController@deleteVideo");


    /*-------------------------------------------Universities------------------------------------------------ */

    Route::get("universities", "UniversitiesController@index")->name('universities');
    Route::post("universities", "UniversitiesController@create")->name('university.create');
    Route::patch("universities/update/{uni_id}", "UniversitiesController@update");
    Route::delete("universities/delete/{uni_id}", "UniversitiesController@destroy");





    /*------------------------------------------------Faculty------------------------------------------------------ */
    Route::get("faculties/{uni_id}", "FacultiesController@index")->name('faculties');
    Route::post("faculties", "FacultiesController@create")->name('faculties.create');
    Route::post("faculties/update/{fac_id}", "FacultiesController@update")->name('faculties.update');
    Route::delete("faculties/delete/{fac_id}", "FacultiesController@destroy")->name('faculties.destroy');


    /*--------------------------------------------Departments------------------------------------------------------ */
    Route::get("departments/{fac_id}", "DepartmentsController@index")->name('departments');
    Route::post("departments", "DepartmentsController@create")->name('department.create');
    Route::patch("departments/update/{dept_id}", "DepartmentsController@update")->name('department.update');
    Route::delete("departments/delete/{dept_id}", "DepartmentsController@destroy")->name('department.delete');




    /*--------------------------------------------Courses--------------------------------------------------*/
    Route::post("/courses", "CoursesController@create")->name('courses.create');
    Route::get("/courses/{dept_id}", "CoursesController@index");
    Route::patch("/courses/update/{dept_id}", "CoursesController@update");
    Route::delete("/courses/delete/{dept_id}", "CoursesController@destroy");



    /*--------------------------------------------Topics--------------------------------------------------*/
    Route::post("/topics", "TopicsController@create")->name('topics.create');
    Route::get("/topics/{topics_id}", "TopicsController@index");
    Route::patch("/topics/update/{topics_id}", "TopicsController@update");
    Route::delete("/topics/delete/{topics_id}", "TopicsController@destroy");






    /*--------------------------------------------Secondary School--------------------------------------------------*/
    Route::get("secondary-schools", "SecondarySchoolsController@index")->name('secondary-school');
    Route::post("secondary-schools", "SecondarySchoolsController@create")->name('secondary.create');






    /*--------------------------------------------class--------------------------------------------------*/
    Route::get("classes", "ClassesController@index")->name('classes');










    /*--------------------------------------------curriculum--------------------------------------------------*/
    Route::get("curriculum", "CurriculumController@index")->name('curriculum');
    Route::get("create-curriculum", "CurriculumController@create")->name('create-curriculum');
    Route::get("curriculum-for-university", "UniversityCurriculumController@index")->name('university-curriculum');
    Route::get("curriculum-for-secondary", "SecondaryCurriculumController@index")->name('secondary-curriculum');












    /*--------------------------------------------instructors--------------------------------------------------*/
    Route::get("instructors", "InstructorsController@index")->name('instructors');


    /*--------------------------------------------students--------------------------------------------------*/
    Route::get("students", "StudentsController@index")->name('students');
    Route::get("secondary-school-students", "AdminController@sec_students")->name('sec.students');
    Route::get("other-institution-students", "AdminController@other_students")->name('other-students');
    Route::get("other-institution-videos", "AdminController@otherVideos")->name('other.videos');


    /*--------------------------------------------Subjects--------------------------------------------------*/
    Route::get("/subjects", "SubjectsController@index")->name('subjects');
    Route::post("/subjects", "SubjectsController@create")->name('subjects.create');
    Route::patch("/subjects/update/{sub_id}", "SubjectsController@update")->name('subjects.update');
    Route::delete("/subjects/delete/{sub_id}", "SubjectsController@destroy")->name('subjects.delete');

    /*------------------------------------------Topics--------------------------------------------*/
    Route::get("/subject/{id}", "AdminTopicsController@index")->name('topics');
    Route::post("/create-topic", "AdminTopicsController@store")->name('topics');
    Route::patch("/topic/update/{id}", "AdminTopicsController@update")->name('topics');
});



Route::get("/departments", "CoursesController@getInstructorDepartments");


/*--------------------------------------------APIS--------------------------------------------------*/

Route::group(['prefix' => 'api'], function () {
    Route::post("/get-video-attributes/", "ApiController@getVideoAttributes");

    Route::get("/admin-courses", "CoursesController@getCourses");
    Route::patch("/instructors/block/{user_id}", "AdminController@blockUsers");
    Route::patch("/instructors/unblock/{user_id}", "AdminController@unBlockUsers");
    Route::patch("/like/{user_id}", "VideoController@unBlockUsers");


    Route::post("/store-video", "VideoController@storeFile");
    Route::post("/upload-profile-pics", "RegistrationController@uploadProfilePics");
    Route::post("/upload-student-profile-pics", "RegistrationController@uploadStudentProfilePics");

    Route::post("/store-sec-video", "VideoController@storeFile");
    Route::post("/publish-video", "VideoController@publishVideo");
    Route::post("/update-video", "VideoController@update");
    Route::post("/video-views", "StudentsController@uploadViews");
    Route::post("/video-thumbs-up", "StudentsController@uploadThumbsUp");
    Route::post("/video-thumbs-down", "StudentsController@uploadThumbsDown");
    Route::post("/video-comments", "StudentsController@videoComments");
    Route::post("/store-inst-video", "VideoController@storeFile");
    Route::patch("/update-instructor-info", "InstructorsController@updateInstructorInfo");
    Route::patch("/update-student-info", "StudentsController@updateStudentInfo");
});

Route::get("api/courses", "CoursesController@getCourses");
Route::get("api/topics", "TopicsController@getTopics");
Route::get("api/faculties/{fac_id}", "DepartmentsController@getFaculties");
Route::get("/api/departments", "CoursesController@getDepartments");
Route::get("/api/level/{id}", "ApiController@getLevel");
Route::get("/api/institution/{id}", "ApiController@getInstitutionLevel");
Route::get("/api/course/", "ApiController@getInstitutionCourse");
Route::get("api/other-institution/topics", "ApiController@getInstitutionTopics");
Route::get("api/sec/topic/{id}", "ApiController@getSecTopics");
Route::get("api/autocomplete", "ApiController@autoComplete");
Route::post("/api/update-password", "ApiController@updatePassword");
