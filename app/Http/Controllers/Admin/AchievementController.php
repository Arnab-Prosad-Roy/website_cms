<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Achievement;
use App\CategoryHead;
use App\Category;
use Illuminate\Http\Request;
use Session;
use DB;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $achievements = Achievement::get();
        return view('backend.achievement.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categoryHead =  CategoryHead::where('slug', 'Achievement')->first();
        $categories =  Category::where('category_head_id', $categoryHead->id)->get();
        return view('backend.achievement.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:250',
            'award_name' => 'required|max:250',
            'issue_date' => 'required',
            'category_id'=>'required',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
            $achievement = new Achievement();
       
        if($request->hasFile('image')){
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/achievements/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $achievement->image =  $imageFullPath;
        }
      

        //$achievement->admin_id = auth('admin')->user()->id;
        $achievement->user_id = '1';
        $achievement->category_id = $request->category_id;
        $achievement->title = $request->title;
        $achievement->award_name = $request->award_name;
        $achievement->issue_date = date('Y-m-d',strtotime($request->issue_date));
        $achievement->status = isset($request->status) ? $request->status : 1 ;
        $achievement->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.achievement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        $categoryHead =  CategoryHead::where('slug', 'blog')->first();
        $categories =  Category::where('category_head_id', $categoryHead->id)->get();
        return view('backend.achievement.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'award_name' => 'required|max:250',
            'issue_date' => 'required',
            'category_id'=>'required',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
            $achievement = new Achievement();
       
        if($request->hasFile('image')){
            @unlink(public_path().'/'.$achievement->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/achievements/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $achievement->image =  $imageFullPath;
        }
      

        $achievement->admin_id = auth('admin')->user()->id;
        $achievement->category_id = $request->category_id;
        $achievement->title = $request->title;
        $achievement->award_name = $request->award_name;
        $achievement->issue_date = date('Y-m-d',strtotime($request->issue_date));
        $achievement->status = isset($request->status) ? $request->status : 1 ;
        $achievement->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.achievement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Achievement $achievement)
    {
        //
    }
}
