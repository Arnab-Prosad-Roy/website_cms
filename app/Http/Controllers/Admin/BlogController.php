<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Blog;
use App\CategoryHead;
use App\Category;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::get();
        return view('backend.blog.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       
        $categoryHead =  CategoryHead::where('slug', 'blog')->first();
        $categories =  Category::where('category_head_id', $categoryHead->id)->get();

        return view('backend.blog.create',get_defined_vars());
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
         //return $request->all();
        $this->validate($request, [
            'category'=>'required',
            'title' => 'required|max:250',
            'slug' =>  'required|max:300|unique:blogs',
            'excerpt' => 'required|max:250',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
            'status' => 'required',

            'authors' => 'nullable|max:250',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:250',
            'meta_tags' => 'nullable|max:250',

            'og_meta_title' => 'nullable|max:250',
            'og_meta_description' => 'nullable|max:250',
            'og_meta_tags' => 'nullable|max:250',
            'og_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
        ]);
//dd($request->all());
        DB::beginTransaction();

        try{

            $blog = new Blog();
            if($request->hasFile('image')){

            //  if($siteSetting->site_footer_logo){
            //     @unlink(public_path().'/'.$siteSetting->site_footer_logo);
            // }

                $originalImage = $request->file('image');
                $imagePath = 'assets/images/blogs/';
                $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
                $imageFullPath = $imagePath.$imageName;
                $originalImage->move(public_path().'/'.$imagePath,$imageName);

                $blog->image =  $imageFullPath;
            }
            if($request->hasFile('og_meta_image')){

            //  if($siteSetting->site_footer_logo){
            //     @unlink(public_path().'/'.$siteSetting->site_footer_logo);
            // }

                $originalImage = $request->file('og_meta_image');
                $imagePath = 'assets/images/blogs/';
                $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
                $imageFullPath = $imagePath.$imageName;
                $originalImage->move(public_path().'/'.$imagePath,$imageName);

                $blog->og_meta_image =  $imageFullPath;
            }

            // $blog->user_id = auth('web')->user()->id;
            $blog->user_id = '1';
            $blog->category_id = $request->category;
            $blog->title = $request->title;
            $blog->slug = $request->slug;
            $blog->excerpt = $request->excerpt;
            $blog->description = $request->description;

            $blog->authors = $request->authors;
            $blog->meta_title	 = $request->meta_title	;
            $blog->meta_description = $request->meta_description;
            $blog->meta_tags = $request->meta_tags;

            $blog->og_meta_title	 = $request->og_meta_title	;
            $blog->og_meta_description = $request->og_meta_description;
            $blog->og_meta_tags = $request->og_meta_tags;

            $blog->status = isset($request->status) ? $request->status : 1 ;
            $blog->save();
            
            DB::commit();
            $status = true;
       
        }catch(\Exception  $e){
           return $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {

        $categoryHead =  CategoryHead::where('slug', 'blog')->first();
        $categories =  Category::where('category_head_id', $categoryHead->id)->get();

        return view('backend.blog.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

         //return $blog;
        
        $this->validate($request, [
            'category'=>'required',
            'title' => 'required|max:250',
            'slug' =>  'required|max:300|unique:blogs,slug,'.$blog->id,
            'excerpt' => 'required|max:250',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp',
            'status' => 'required',

            'authors' => 'nullable|max:250',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:250',
            'meta_tags' => 'nullable|max:250',

            'og_meta_title' => 'nullable|max:250',
            'og_meta_description' => 'nullable|max:250',
            'og_meta_tags' => 'nullable|max:250',
            'og_meta_image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp',
        ]);
            // return $request->all();



            DB::beginTransaction();

            try{
                if($request->hasFile('image')){

                 if($blog->image){
                    @unlink(public_path().'/'.$blog->image);
                }

                    $originalImage = $request->file('image');
                    $imagePath = 'assets/images/blogs/';
                    $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
                    $imageFullPath = $imagePath.$imageName;
                    $originalImage->move(public_path().'/'.$imagePath,$imageName);

                    $blog->image =  $imageFullPath;
                }
                if($request->hasFile('og_meta_image')){

                 if($blog->og_meta_image){
                    @unlink(public_path().'/'.$blog->og_meta_image);
                }

                    $originalImage = $request->file('og_meta_image');
                    $imagePath = 'assets/images/blogs/';
                    $imageName = uniqid().time().'logo.'.$originalImage->getClientOriginalExtension();
                    $imageFullPath = $imagePath.$imageName;
                    $originalImage->move(public_path().'/'.$imagePath,$imageName);

                    $blog->og_meta_image =  $imageFullPath;
                }

                //$blog->admin_id = auth('web')->user()->id;
                $blog->user_id = '1';
                $blog->category_id = $request->category;
                $blog->title = $request->title;
                $blog->slug = $request->slug;
                $blog->excerpt = $request->excerpt;
                $blog->description = $request->description;
    

                $blog->authors = $request->authors;
                $blog->meta_title	 = $request->meta_title	;
                $blog->meta_description = $request->meta_description;
                $blog->meta_tags = $request->meta_tags;
    
                $blog->og_meta_title	 = $request->og_meta_title	;
                $blog->og_meta_description = $request->og_meta_description;
                $blog->og_meta_tags = $request->og_meta_tags;
    
                $blog->status = isset($request->status) ? $request->status : 1 ;
                $blog->save();
            
            DB::commit();
            $status = true;
            
            }catch(\Exception  $e){
                return $message = $e->getMessage();
                DB::rollback();
                $status = false;
                return back()->with('error','Please fill out form correctly...');
            }
            Session::flash('success','Information Saved Successfully..');
            return \redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
