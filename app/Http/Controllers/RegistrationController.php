<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailVerificationMailable;
use App\OtherInstitutions;
use App\OtherInstitutionStudents;
use App\SecStudents;
use App\State;
use App\Universities;
use App\User;
use App\Students;
use App\Faculties;
use App\Instructors;
use App\Validators\ReCaptcha;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\StudentSignupRequest;

class RegistrationController extends Controller
{
    public function verifyCode(Request $request){

        if (Session::get("code") == $request->get("code")){
            $states =   State::all();
            $universities = Universities::all();
            $faculties = Faculties::all();
            $institutions = OtherInstitutions::all();
            $role = session()->get("role");
            $dateTime = Carbon::now();
            User::where('email', $request->session()->get('email'))->update(['email_verified_at' => Carbon::parse($dateTime)->format('Y-m-d H:i:s')]);
            return view('signupupdate')
                ->with('role', $role)
                ->with('institutions', $institutions)
                ->with('faculties', $faculties)
                ->with('states', $states)
                ->with('universities', $universities);
        }
        return redirect()->back()->with("codemsg",  "Incorrect Code");
    }
    public function resendPasswordReset(Request $request)
    {

        $email = $request->session()->get('email');
        $code = Str::random(100);
        $request->session()->put('code', $code);
        try {
            $data = array('name'=>"no reply", 'code' => $code);
//            Mail::send('emails.reset_password', $data, function($message) use ($email){
//                $message->to($email)
//                    ->subject('Password Reset');
////            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
//                $message->from('no-reply@acadazone.com','Acadazone');
//            });
        }catch (\Exception $e){
            echo $e->getMessage();
        }

        return redirect()->back()->with('msg', 'Mail Resent');
    }

    public function resendEmail(Request $request)
    {

        $code = Str::random(6);
        $email = $request->session()->get('email');
        $role =  $request->session()->get('role');
        Session::put("code", $code);
        try {
            $data = array('email_code'=>"no reply", 'code' => $code, 'role' => $role);
            Mail::send('emails.send_email_verification', $data, function($message) use ($email){
                $message->to($email)
                    ->subject('Email Verification');
//            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
                $message->from('no-reply@acadazone.com','Acadazone');
            });
//            $emailExist = User::where('email', $request->session()->get('email'))->exists();
//            if ($emailExist == false){
//                User::create([
//                    'email' => $request->session()->get('email'),
//                    'password' => Hash::make($request->session()->get('password')),
//                ]);
//            }else{
//
//            }

        }catch (\Exception $e){
            echo $e->getMessage();
        }
        return redirect()->back()->with('msg', 'Mail Resent');
    }
    public function resetPassword(Request $request, $id)
    {
        $code = $request->session()->get('code');
//        if ($code = $id){
         $email = $_GET['email'];
            return view('forget_password')->with('email', $email);
//        }
        return "Unauthorized Access";
    }
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->get('email');
        $request->session()->put('email', $request->get('email'));
        $code = Str::random(100);
        $request->session()->put('code', $code);
        try {
            $data = array('name'=>"no reply", 'code' => $code, 'email' => $request->get('email'));
            Mail::send('emails.reset_password', $data, function($message) use ($email){
                $message->to($email)
                    ->subject('Password Reset');
//            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
                $message->from('no-reply@acadazone.com','Acadazone');
            });
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        return view('reset_password_notification');
    }
    public function showEmail(Request $request)
    {
        return view("email");
    }

    public function emailVerify(Request $request)
    {

        $email = $request->session()->get('email');
        $code =  \Illuminate\Support\Str::random(6);
        $role =  $request->session()->get('role');
        Session::put("code", $code);
        try {
            $data = array('email_code'=>"no reply", 'code' => $code, 'role' => $role);
            Mail::send('emails.send_email_verification', $data, function($message) use ($email){
                $message->to($email)
                    ->subject('Email Verification');
//            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
                $message->from('no-reply@acadazone.com','Acadazone');
            });
//            if (!User::where('email', $request->session()->get('email'))->exists()){
//                User::create([
//                    'email' => $request->session()->get('email'),
//                    'password' => Hash::make($request->session()->get('password'))
//                ]);
//
//            }
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        return view('email_notification');
    }
    public function updateProfile(Request $request, $verify_code)
    {

        $states =   State::all();
        $universities = Universities::all();
        $faculties = Faculties::all();
        $institutions = OtherInstitutions::all();
        $role = $_GET['role'];
//        if($request->session()->get('code') == $verify_code){
        $dateTime = Carbon::now();
        User::where('email', $request->session()->get('email'))->update(['email_verified_at' => Carbon::parse($dateTime)->format('Y-m-d H:i:s')]);
        return view('signupupdate')
            ->with('role', $role)
            ->with('institutions', $institutions)
            ->with('faculties', $faculties)
            ->with('states', $states)
            ->with('universities', $universities);

    }
    public function registerEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|same:cpassword',
            'cpassword' => 'required',
//            'g-recaptcha-response' => 'required|captcha',
            'role' => 'required'

        ],[
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'cpassword.required' => 'Confirm Password is required',
            'password.same' => 'Password Must match',
//            'g-recaptcha-response.recaptcha'=>'Please ensure that you are human!',
            'g-recaptcha-response.required'=>'Please ensure that you are human!',
            'role.required' => 'Select your role.'
        ]);
        $userEmailIsRegistered = User::where('email', '=',  $request->get('email'))->exists();

        if($userEmailIsRegistered){
            return redirect()->back()->withInput()->with('email', 'Email is taken');
        }else{

            $request->session()->put('email', $request->get('email'));
            $request->session()->put('password', $request->get('password'));
            $request->session()->put('code', Str::random(100));
            $request->session()->put('role', $request->get('role'));

            $states =   State::all();
            $universities = Universities::all();
            $faculties = Faculties::all();
            $institutions = OtherInstitutions::all();
            $role = session()->get("role");
            $dateTime = Carbon::now();
            User::where('email', $request->session()->get('email'))->update(['email_verified_at' => Carbon::parse($dateTime)->format('Y-m-d H:i:s')]);
            // return view('signupupdate')
            //     ->with('role', $role)
            //     ->with('institutions', $institutions)
            //     ->with('faculties', $faculties)
            //     ->with('states', $states)
            //     ->with('universities', $universities);
           return redirect('email/verify');
        }
    }
    public function signup(StudentSignupRequest $request){
        $userInfo = ['email' =>  $request->session()->get('email'), 'password' =>  $request->session()->get('password')];
        $userExist = User::where('username', '=', $request->get('username'))->exists();
        $instructorPhoneIsRegistered = Instructors::where('phone', '=', $request->get('phone'))->exists();
        $uniStudentPhoneIsRegistered = Students::where('phone', '=', $request->get('phone'))->exists();
        $institutionStudentPhoneIsRegistered = OtherInstitutionStudents::where('phone', '=', $request->get('phone'))->exists();
        $secStudentPhoneIsRegistered = SecStudents::where('phone', '=', $request->get('phone'))->exists();
        $request->request->add(['user_id' => Str::random(20)]);
        $request->request->add(['token' => Str::random(20)]);
        $request->request->add(['blocked' =>'N']);

        $request->request->add(['email' =>  $request->session()->get('email')]);
        $user_id = Str::random(20);
        if ($userExist) {
            return redirect()->back()->withInput()->with('username', 'Username is taken');
        }else{

            if (  $request->session()->get('email') == "") {
                return "This is not the browser you used to signup. Please use the same browser to update or copy to url to the browser you used to sign up. Press enter.";
            }
            if($request->get("role") == 'I'){

                if (!$instructorPhoneIsRegistered) {

                    $request->validated();
                    $dateTime = Carbon::now();
                    $instructorIsRegistered = Instructors::create($request->all());
                    $userIsRegisterd =  User::create([
                        'email' =>  $request->session()->get('email'),
                        'password' => Hash::make( $request->session()->get('password')),
                        'user_id' =>  Hash::make($request->get('email')),
                        'username' => $request->get('username'),
                        'role' => $request->session()->get('role'),
                        'profile_updated' => 1,
                        'blocked' => 'N'
                    ]);
                    if ($instructorIsRegistered && $userIsRegisterd){
                        $userInfo = ['email' => $request->session()->get('email'), 'password' => $request->session()->get('password')];
                        if (Auth::attempt($userInfo))
                            return redirect('instructor/dashboard');
                    }
                }else{
                    return redirect()->back()->withInput()->with('phone', 'Phone is taken');
                }
            }elseif($request->get("role")  == 'S'){

                if ($request->get("institution") == "uni"){
                    return  $this->registerUniversityStudents($uniStudentPhoneIsRegistered, $user_id, $request, $userInfo);
                }elseif($request->get("institution") == "others"){
                    return $this->registerInstitutionStudents($institutionStudentPhoneIsRegistered, $user_id, $request, $userInfo);
                }elseif($request->get('institution') ==  "sec"){

                    return $this->registerSecondaryStudent($secStudentPhoneIsRegistered,$user_id,$request,$userInfo);
                }
            }
        }

    }

    public function registerSecondaryStudent($secStudentPhoneIsRegistered, $user_id, $request, $userInfo)
    {
        $request->validate([
            'school_name' => 'required',
            'student_class' => 'required'
        ],[
            'school_name.required' => 'School Name is Required',
            'student_class.required' => 'Student Class is Required'
        ]);

        $userIsRegistered = $this->registerUser($request, $user_id);

        $studentIsRegistered = SecStudents::create(
            $request->except(
                'level',
                'role',
                'institution_id',
                'institution_level',
                'institution',
                'others',
                'token',
                'university',
                'faculty',
                'department',
                'blocked'
            )
        );

        if(Auth::attempt($userInfo)){
            return redirect()->to("student/videos");
        }

        if ($userIsRegistered && $studentIsRegistered){
            $this->redirectUser($userInfo, "student/videos");
        }

    }
    public function registerUniversityStudents($uniStudentPhoneIsRegistered, $user_id, $request, $userInfo)
    {
        $request->validate([
            'institution' => 'required',
            'university' => 'required',
            'faculty' => 'required'  ,
            'department' => 'required',
            'level' => 'required'
        ],[
            'institution.required' => 'Institution is required',
            'university.required' => 'University Is required',
            'faculty.required' => 'Faculty Is required',
            'department.required' => 'Department Is required',
            'level.required' => 'Level Is required'
        ]);
        if (!$uniStudentPhoneIsRegistered) {
            $userIsRegistered = $this->registerUser($request, $user_id);
            $studentIsRegistered = Students::create(
                $request->except(
                    'role',
                    'institution_id',
                    'institution_level',
                    'institution',
                    'others',
                    'token',
                    'school_name',
                    'blocked',
                    'student_class'
                )
            );

            if(Auth::attempt($userInfo)){
                return redirect()->to("student/videos");
            }else{
                return "false";
            }

        }else{
            return redirect()->back()->withInput()->with('phone', 'Phone is taken');
        }

    }
    public function registerInstitutionStudents($institutionStudentPhoneIsRegistered, $user_id, $request, $userInfo)
    {

        if (!$institutionStudentPhoneIsRegistered){
            $request->validate([
                'institution' => 'required',
                'institution_id' => 'required|string',
                'institution_level' => 'required'
            ],[
                'institution.required' => 'Institution is required',
                'institution_id.required' => 'School is required',
                'institution_level.required' => 'Level is required'
            ]);
            $userIsRegistered = $this->registerUser($request, $user_id);
            $request->request->add(['user_id' => $user_id]);
            $otherInstitutionStudentRegistered =  OtherInstitutionStudents::create($request->except('role',
                'level',
                'institution',
                'others',
                'token',
                'school_name',
                'university',
                'faculty',
                'department',
                'blocked',
                'student_class')
            );
            if(Auth::attempt($userInfo)){
                return redirect()->to("student/videos");
            }
        }else{
            return redirect()->back()->withInput()->with('phone', 'Phone is taken');
        }

    }

    public function registerUser($request, $user_id)
    {
        $userIsRegistered = User::create([
            'user_id' =>  $user_id,
            'username' => $request->get("username"),
            'email' => $request->session()->get("email"),
            'password' => Hash::make($request->session()->get("password")),
            'role' => $request->session()->get('role'),
            'blocked' => 'N',
            'profile_updated' => 1,
            'institution' => $request->get('institution')
        ]);
    }

    public function signupForm(){
        $faculties = Faculties::all();
        return view('signupform')->with('faculties', $faculties);
    }

    public function profileUpdate(){
        return view('profileUpdate');
    }

    public function uploadProfilePics(Request $request){
        $fileNameToStore = $this->createFilename($request);

        $finalPath = "profile_pics/";
        if ($request->hasFile('profilePics')) {
            if ($request->profilePics->move($finalPath, $fileNameToStore)) {
                if (Instructors::where('email', Auth::user()->email)->value('profile_pics') != "") {
                    unlink(Instructors::where('email', Auth::user()->email)->value('profile_pics'));
                }
                $data =  Instructors::where('email', $request->get('userEmail'))->update(['profile_pics' => $finalPath.'/'. $fileNameToStore]);
                $data =  User::where('email', $request->get('userEmail'))->update(['profile_updated' => 1 ]);
                return response()->json($data, 200);
            }
        }
    }


    public function uploadStudentProfilePics(Request $request){

        $fileNameToStore = $this->createFilename($request);

        $options = Auth::user()->institution;
        $finalPath = "profile_pics/";

        if ($request->hasFile('profilePics')) {
            if ($request->profilePics->move($finalPath, $fileNameToStore)) {
                if ($options == "uni"){
                    if (Students::where('email', Auth::user()->email)->value('profile_pics') != "") {
                        unlink(Students::where('email', Auth::user()->email)->value('profile_pics'));
                    }
                    $data =  Students::where('email', $request->get('userEmail'))->update(['profile_pics' => $finalPath.'/'. $fileNameToStore]);
                    $data =  User::where('email', $request->get('userEmail'))->update(['profile_updated' => 1 ]);
                    return response()->json($data, 200);


                }elseif ($options == "sec"){
                    if (SecStudents::where('email', Auth::user()->email)->value('profile_pics') != "") {
                        unlink(SecStudents::where('email', Auth::user()->email)->value('profile_pics'));
                    }
                    $data =  SecStudents::where('email', $request->get('userEmail'))->update(['profile_pics' => $finalPath.'/'. $fileNameToStore]);
                    $data =  User::where('email', $request->get('userEmail'))->update(['profile_updated' => 1 ]);
                    return response()->json($data, 200);


                }elseif ($options == "others"){
                    if (OtherInstitutionStudents::where('email', Auth::user()->email)->value('profile_pics') != "") {
                        unlink(OtherInstitutionStudents::where('email', Auth::user()->email)->value('profile_pics'));
                    }
                    $data =  OtherInstitutionStudents::where('email', $request->get('userEmail'))->update(['profile_pics' => $finalPath.'/'. $fileNameToStore]);
                    $data =  User::where('email', $request->get('userEmail'))->update(['profile_updated' => 1 ]);
                    return response()->json($data, 200);
                }
            }

        }
    }
    protected function createFilename($request)
    {

        $dateFolder = date("Y_m_W");

        $extension = $request->profilePics->getClientOriginalExtension();

        $name = explode('.', $extension)[0];
        $file_name = str_replace(' ', '_', $name);

        // Add timestamp hash to name of the file
        $filename = $dateFolder .'_' .md5(time()) . "." . $extension;
        return $filename;
    }

}
