<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Certification;
use Illuminate\Http\Request;
use Session;
use DB;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certifications = Certification::get();
        return view('backend.certification.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.certification.create',get_defined_vars());
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
            'name' => 'required|max:250',
            'issue_date' => 'nullable',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
            $certification = new Certification();
       
        if($request->hasFile('image')){
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/certifications/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $certification->image =  $imageFullPath;
        }
      

        //$certification->admin_id = auth('admin')->user()->id;
        $certification->user_id = '1';
        $certification->name = $request->name;
        $certification->issue_date = date('Y-m-d',strtotime( $request->issue_date));
        $certification->status = isset($request->status) ? $request->status : 1 ;
        $certification->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.certification.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification)
    {
        return view('backend.certification.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certification $certification)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'issue_date' => 'nullable',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
        
       
        if($request->hasFile('image')){
            @unlink(public_path().'/'.$certification->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/certifications/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $certification->image =  $imageFullPath;
        }
      

        //$certification->admin_id = auth('admin')->user()->id;
        $certification->user_id = '1';
        $certification->name = $request->name;
        $certification->issue_date = date('Y-m-d',strtotime( $request->issue_date));
        $certification->status = isset($request->status) ? $request->status : 1 ;
        $certification->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.certification.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification)
    {
        //
    }
}
