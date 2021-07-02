<?php

namespace App\Http\Controllers;

use App\SecTopics;
use App\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTopicsController extends Controller
{
    public function index($id)
    {
        $topics = SecTopics::where('sub_id', $id)->get();
        $subjects = Subjects::all();
        return view('admin.sec_topics', ['subjects' => $subjects, 'topics' => $topics]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'topic_name' => 'required',
            'topic_id' => 'required'
        ]);
        $request->request->add(['topic_id' => Str::random(20)]);
        SecTopics::create($request->except('token'));

        return redirect()->back()->with('success_msg', 'Topic Created');
    }

    public function update(Request $request)
    {

        SecTopics::where('topic_id', $request->get('topic_id'))->update(['topic_name' => $request->get('name')]);
        return redirect()->back()->with('success_msg', 'Topic Updated');

    }
}
