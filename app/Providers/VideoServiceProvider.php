<?php

namespace App\Providers;

use App\OtherInstitutions;
use App\SecVideos;
use App\Subjects;
use App\Video;
use App\Universities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class VideoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // view()->composer(['instructor.videos', 'instructor.video'], function ($view) {
        //     $view->with('videos', Video::orderBy('created_at', 'DESC')->where('user_email', Auth::user()->email)->paginate(8));
        // });
        view()->composer(['student.videos', 'student.video', 'student.searched_videos', 'student_password', 'student.profile', 'student.trending', 'student.liked_videos'], function ($view) {
            $view->with('universities', Universities::all());
        });

        view()->composer(['student.videos', 'student.video', 'student.searched_videos', 'student_password', 'student.profile', 'student.trending', 'student.liked_videos'], function ($view) {
            $view->with('subjects', Subjects::all());
        });
        view()->composer(['student.videos', 'student.video', 'student.searched_videos', 'student_password', 'student.profile', 'student.trending', 'student.liked_videos'], function ($view) {
            $view->with('otherInstitutions', OtherInstitutions::all());
        });
        view()->composer(['student.liked_videos', 'student.subscriptions', 'student.history'], function ($view) {
            $view->with('rec_videos', Video::leftJoin('instructors', 'instructors.email', '=', 'videos.instructor_email')->where('videos.publish', 1)->orderBy('videos.created_at', 'DESC')->get());
        });
        view()->composer([ 'instructor.video'], function ($view) {
            $view->with('videos', Video::leftJoin('instructors', 'videos.instructor_email', '=', 'instructors.email')->where('videos.publish', 1)->orderBy('videos.created_at', 'DESC')->get());
        });
        view()->composer(['instructor.video'], function ($view) {
            $view->with('sec_videos', SecVideos::leftJoin('instructors', 'sec_videos.instructor_email', '=', 'instructors.email')->where('sec_videos.publish', 1)->orderBy('sec_videos.created_at', 'DESC')->get());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
