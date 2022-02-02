<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Event;
use App\CategoryHead;
use App\Category;
use Illuminate\Http\Request;
use Session;
use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::get();
        return view('backend.event.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryHead =  CategoryHead::where('slug', 'event')->first();
        $categories =  Category::where('category_head_id', $categoryHead->id)->get();
        return view('backend.event.create',get_defined_vars());
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
            'slug' =>  'nullable|max:300|unique:events',
            'description' => 'nullable',
            'category_id'=>'required',
            'event_date' => 'nullable|max:250',
            'event_time' => 'nullable|max:250',
            'event_venue' => 'nullable|max:250',
            'excerpt' => 'nullable|max:250',
            'venue_location' => 'nullable|max:250',
            'organizer_name' => 'nullable|max:250',
            'organizer_email' => 'nullable|max:250',
            'organizer_phone' => 'nullable|max:250',
            'organizer_website' => 'nullable|max:250',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:250',
            'meta_tags' => 'nullable|max:250',
            'event_end' => 'nullable',
            'status' => 'required',

            'authors' => 'nullable|max:250',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:250',
            'meta_tags' => 'nullable|max:250',

            'og_meta_title' => 'nullable|max:250',
            'og_meta_description' => 'nullable|max:250',
            'og_meta_tags' => 'nullable|max:250',

            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
            'og_meta_image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();
        //dd($request->all());
        try{
            $event = new Event();
       
        if($request->hasFile('image')){
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/events/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $event->image =  $imageFullPath;
        }
        if($request->hasFile('og_meta_image')){
            $originalImage = $request->file('og_meta_image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/events/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $event->image =  $imageFullPath;
        }

        //$event->admin_id = auth('admin')->user()->id;
        $event->user_id = '1';
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->description = $request->description;
        $event->excerpt = $request->excerpt;


        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->event_venue = $request->event_venue;
        $event->venue_location = $request->venue_location;
        $event->organizer_name = $request->organizer_name;
        $event->organizer_email = $request->organizer_email;
        $event->organizer_phone = $request->organizer_phone;
        $event->organizer_website = $request->organizer_website;
        $event->event_end = isset($request->event_end) ? $request->event_end : 1 ;
  

   
        $event->meta_title	 = $request->meta_title	;
        $event->meta_description = $request->meta_description;
        $event->meta_tags = $request->meta_tags;

        $event->status = isset($request->status) ? $request->status : 1 ;
      
        $event->save();
        
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
        return \redirect()->route('admin.event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $categoryHead =  CategoryHead::where('slug', 'event')->first();
        $categories =  Category::where('category_head_id', $categoryHead->id)->get();
        return view('backend.event.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title' => 'required|max:250',
            'slug' =>  'nullable|max:300|unique:events',
            'description' => 'nullable',
            'category_id'=>'required',
            'event_date' => 'nullable|max:250',
            'event_time' => 'nullable|max:250',
            'event_venue' => 'nullable|max:250',
            'excerpt' => 'nullable|max:250',
            'venue_location' => 'nullable|max:250',
            'organizer_name' => 'nullable|max:250',
            'organizer_email' => 'nullable|max:250',
            'organizer_phone' => 'nullable|max:250',
            'organizer_website' => 'nullable|max:250',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:250',
            'meta_tags' => 'nullable|max:250',
            'event_end' => 'nullable',
            'status' => 'required',

            'authors' => 'nullable|max:250',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:250',
            'meta_tags' => 'nullable|max:250',

            'og_meta_title' => 'nullable|max:250',
            'og_meta_description' => 'nullable|max:250',
            'og_meta_tags' => 'nullable|max:250',

            'image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
            'og_meta_image' => 'nullable|mimes:jpeg,png,jpg,svg,webp',
        ]);


        DB::beginTransaction();

        try{
           
       
        if($request->hasFile('image')){
            @unlink(public_path().'/'.$event->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/events/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $event->image =  $imageFullPath;
        }
        if($request->hasFile('og_meta_image')){
            $originalImage = $request->file('og_meta_image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/events/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $event->image =  $imageFullPath;
        }

        //$event->admin_id = auth('admin')->user()->id;
        $event->user_id = '1';
        $event->category_id = $request->category_id;
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->description = $request->description;
        $event->excerpt = $request->excerpt;
        
        $event->event_date = $request->event_date;
        $event->event_time = $request->event_time;
        $event->event_venue = $request->event_venue;
        $event->venue_location = $request->venue_location;
        $event->organizer_name = $request->organizer_name;
        $event->organizer_email = $request->organizer_email;
        $event->organizer_phone = $request->organizer_phone;
        $event->organizer_website = $request->organizer_website;
        $event->event_end = isset($request->event_end) ? $request->event_end : 1 ;
   
        $event->meta_title	 = $request->meta_title	;
        $event->meta_description = $request->meta_description;
        $event->meta_tags = $request->meta_tags;

        $event->status = isset($request->status) ? $request->status : 1 ;
      
        $event->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
