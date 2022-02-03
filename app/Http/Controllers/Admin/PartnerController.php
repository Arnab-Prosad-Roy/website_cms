<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Partner;
use Illuminate\Http\Request;
use Session;
use DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::get();
        return view('backend.partner.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partner.create',get_defined_vars());
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
            'site_url' => 'nullable|max:250',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
            $partner = new Partner();
       
        if($request->hasFile('image')){
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/partners/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $partner->image =  $imageFullPath;
        }
      

        //$partner->admin_id = auth('admin')->user()->id;
        $partner->user_id = '1';
        $partner->name = $request->name;
        $partner->site_url = $request->site_url;
        $partner->status = isset($request->status) ? $request->status : 1 ;
        $partner->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.partner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('backend.partner.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $this->validate($request, [
            'name' => 'required|max:250',
            'site_url' => 'nullable|max:250',
            'status' => 'nullable',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
    
       
        if($request->hasFile('image')){
            @unlink(public_path().'/'.$partner->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/partners/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $partner->image =  $imageFullPath;
        }
      

        //$partner->admin_id = auth('admin')->user()->id;
        $partner->user_id = '1';
        $partner->name = $request->name;
        $partner->site_url = $request->site_url;
        $partner->status = isset($request->status) ? $request->status : 1 ;
        $partner->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.partner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
