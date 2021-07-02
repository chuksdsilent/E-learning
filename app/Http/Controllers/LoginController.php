<?php

namespace App\Http\Controllers;

use App\User;
use App\Payments;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function profileUpdate(){
        return view('profile_update');
    }
    public function userData($request)
    {

        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
         ]);
       return $data = [
            'email' => $request->email,
            'password' => $request->password
            ];
    }
    public function checkStudentCredentials(Request $request){

        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }

        if (Auth::attempt($this->userData($request))) {

            session()->put('role', Auth::user()->role);
            session()->put('email', Auth::user()->email);

            $this->assignToken($request);
            $profileUpdateStatus = Auth::user()->profile_updated;

            if( Auth::user()->role == "I"){
//                if (Auth::user()->profile_updated == 0) {
//                    return redirect()->back()->with('errmsg', 'Update your profile')->with('class', 'danger')->withInput();
//                }else{
                    return redirect('instructor/dashboard');
//                }
            }else{

                if ($profileUpdateStatus != 1){
                    return redirect()->back()->with('errmsg', 'Click on the link in your mail to update your profile');
                }
                $student_data = Payments::where('student_email', Auth::user()->email)->orderBy('created_at', 'DESC')->first();

//                    if (\Carbon\Carbon::parse($student_data->expiry_date)->lt(\Carbon\Carbon::now())) {
//                        return redirect()->intended('/login')->with('errmsg', 'Sorry. Your plan has expired.')->with('class', 'danger'); ;
//
//                    }
                    return redirect()->to('student/videos');
            }
        }else{
            return redirect()->back()->with('errmsg', 'Incorrect Username/Password')->with('class', 'danger')->withInput();
        }
    }
    public function instructorLogin(){
        session(['link' => url()->previous()]);
        return view('instructor.login');
    }
    public function checkInstructorCredentials(Request $request){
        if (Auth::attempt($this->userData($request))) {
            $this->assignToken($request);
//            if (Auth::user()->profile_updated == 0) {
//                    return redirect()->back()->with('errmsg', 'Update your profile')->with('class', 'danger')->withInput();
//                }else{
                    return redirect('instructor/dashboard');
//                }

        }else{
            return redirect()->back()->with('errmsg', 'Incorrect Username/Password')->with('class', 'danger')->withInput();
        }
    }
    public function adminLogin(){
        return view('admin.login');
    }
    public function checkAdminCredentials(Request $request){

        if (Auth::attempt($this->userData($request))) {
            $this->assignToken($request);
            return redirect('admin/dashboard');
        }else{
            return redirect()->back()->with('errmsg', 'Incorrect Username/Password')->with('class', 'danger')->withInput();
        }
    }
    public function assignToken(Request $request){
        $token = Str::random(60);
        $request->session()->put('token', $token);
        User::where('email', Auth::user()->email)->update(['token' => $token]);
    }
}
