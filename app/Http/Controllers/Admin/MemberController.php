<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Member;
use Illuminate\Http\Request;
use Session;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::get();
        return view('backend.member.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.member.create',get_defined_vars());
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
            'name' => 'required|max:250',
            'designation' => 'required|max:250',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);

        //dd($request->all());
        DB::beginTransaction();

        try{
            $member = new Member();
       
        if($request->hasFile('image')){
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/members/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $member->image =  $imageFullPath;
        }
      

        //$member->admin_id = auth('admin')->user()->id;
        $member->user_id = '1';
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->status = isset($request->status) ? $request->status : 1 ;
        $member->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            return $message;
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.member.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('backend.member.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|max:250',
            'designation' => 'required|max:250',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
         
       
        if($request->hasFile('image')){
            @unlink(public_path().'/'.$member->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/members/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $member->image =  $imageFullPath;
        }
      

        //$member->admin_id = auth('admin')->user()->id;
        $member->user_id = '1';
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->status = isset($request->status) ? $request->status : 1 ;
        $member->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Updated Successfully..');
        return \redirect()->route('admin.member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
