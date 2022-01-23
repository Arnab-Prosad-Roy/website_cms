<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Slider;
use Illuminate\Http\Request;
use Session;
use DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('backend.slider.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create',get_defined_vars());
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
            'title' => 'nullable|max:250',
            'subtitle' => 'nullable|max:250',
            'btn_url' => 'nullable|max:250',
            'status' => 'nullable',
            'image' => 'required|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
            $slider = new Slider();
       
        if($request->hasFile('image')){
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/sliders/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $slider->image =  $imageFullPath;
        }
      

        $slider->admin_id = auth('admin')->user()->id;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->btn_url = $request->btn_url;
        $slider->status = isset($request->status) ? $request->status : 1 ;
        $slider->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.slider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title' => 'nullable|max:250',
            'subtitle' => 'nullable|max:250',
            'btn_url' => 'nullable|max:250',
            'status' => 'nullable',
            'image' => 'required|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
        
       
        if($request->hasFile('image')){
            @unlink(public_path().'/'.$slider->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/sliders/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $slider->image =  $imageFullPath;
        }
      

        $slider->admin_id = auth('admin')->user()->id;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->btn_url = $request->btn_url;
        $slider->status = isset($request->status) ? $request->status : 1 ;
        $slider->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
