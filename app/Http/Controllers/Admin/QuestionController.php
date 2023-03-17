<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions=Question::paginate(10);
        return view('admin.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::all();
        return view('admin.question.create',compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
            'type'=>'required'
        ]);


        Question::create([
            'question'=>$request->question,
            'answer'=>$request->answer,
            'type'=>$request->type,
            'service_id'=>$request->service_id,

        ]);
        return redirect()->route('admin.questions.index')->
        with('msg', 'Question added successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question=Question::find($id);
        $services=Service::all();

        return view('admin.question.edit',compact('question','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question=Question::find($id);
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
            'type'=>'required'
        ]);
        $question->update([
            'question'=>$request->question,
            'answer'=>$request->answer,
            'type'=>$request->type,
            'service_id'=>$request->service_id,

        ]);

        return redirect()->route('admin.questions.index')->
        with('msg', 'Question update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question=Question::find($id);
        $question->delete();
        return redirect()->route('admin.questions.index')->
        with('msg', 'Question delete successfully')->with('type', 'success');
    }
     public function trash()
    {
        $questions = Question::onlyTrashed()->paginate(10);

        return view('admin.question.trash', compact('questions'));
    }

    public function restore($id)
    {
        Question::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.questions.index')->with('msg', 'Question restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Question::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.questions.index')->with('msg', 'Question deleted permanintly successfully')->with('type', 'danger');
    }

}
