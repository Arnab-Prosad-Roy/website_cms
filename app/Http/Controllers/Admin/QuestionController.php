<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Http\Request;
use Session;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::get();
        return view('backend.question.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.question.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|max:250',
            'answer' => 'required',
            'category_id'=>'required',
            'status' => 'nullable',
        ]);


        DB::beginTransaction();

        try{
            $question = new Question();
            $question->admin_id = auth('admin')->user()->id;
            $question->category_id = $request->category_id;
            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->status = isset($request->status) ? $request->status : 1 ;
            $question->save();
            
            DB::commit();
            $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('backend.question.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $this->validate($request, [
            'question' => 'required|max:250',
            'answer' => 'required',
            'category_id'=>'required',
            'status' => 'nullable',
        ]);


        DB::beginTransaction();

        try{
         
            $question->admin_id = auth('admin')->user()->id;
            $question->category_id = $request->category_id;
            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->status = isset($request->status) ? $request->status : 1 ;
            $question->save();
            
            DB::commit();
            $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Updated Successfully..');
        return \redirect()->route('admin.question.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
