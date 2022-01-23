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
use  App\Helpers\AppHelper;


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

       
         // $categories =  AppHelper::getCategory('blog');
    
          // $attachments =  AppHelper::getCategory('attachment-type')['categories'];

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

         AppHelper::filterInputBeforeValidation($request);

        // return $request->all();
      
        $this->validate($request, [
            'title' => 'required|max:250',
            'slug' =>  'required|max:300|unique:blogs',
            'excerpt' => 'required|max:250',
            'description' => 'required',
            'category'=>'required',
            'status' => 'required',

            'image' => 'required|max:250',
      
            'attachment' => 'required_with:attachment_type|string|nullable|max:250',
            'attachment_type' => 'required_with:attachment|string|nullable|max:250',
            
            'authors' => 'nullable|max:250',
            'meta_title' => 'nullable|max:250',
            'meta_description' => 'nullable|max:250',
            'meta_tags' => 'nullable|max:250',

            'og_meta_title' => 'nullable|max:250',
            'og_meta_description' => 'nullable|max:250',
            'og_meta_tags' => 'nullable|max:250',
            'og_meta_image' => 'nullable|max:250',
        ]);
    
        AppHelper::filterInputAfterValidation($request);

        DB::beginTransaction();

        try{

            $blog = new Blog();

            $blog->admin_id = auth('admin')->user()->id;
            $blog->category_id = $request->category;
            $blog->title = $request->title;
            $blog->slug = $request->slug;
            $blog->excerpt = $request->excerpt;
            $blog->description = $request->description;

            $blog->image = $request->image;
            $blog->attachment = $request->attachment;
            $blog->attachment_type = $request->attachment_type;

            $blog->authors = $request->authors;
            $blog->meta_title	 = $request->meta_title	;
            $blog->meta_description = $request->meta_description;
            $blog->meta_tags = $request->meta_tags;

            $blog->og_meta_title	 = $request->og_meta_title	;
            $blog->og_meta_description = $request->og_meta_description;
            $blog->og_meta_tags = $request->og_meta_tags;
            $blog->og_meta_image = $request->og_meta_image;

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

       $categories =  AppHelper::getCategory('blog');
    
          $attachments =  AppHelper::getCategory('attachment-type')['categories'];

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

        AppHelper::filterInputBeforeValidation($request);

        // return $request->all();
        
       $this->validate($request, [
           'title' => 'required|max:250',
           'slug' =>  'required|max:300|unique:blogs,slug,'.$blog->id,
           'excerpt' => 'required|max:250',
           'description' => 'required',
           
           'category'=>'required',
           'status' => 'required',

           'image' => 'required|max:250',
     
           'attachment' => 'required_with:attachment_type|string|nullable|max:250',
           'attachment_type' => 'required_with:attachment|string|nullable|max:250',
           
           'authors' => 'nullable|max:250',
           'meta_title' => 'nullable|max:250',
           'meta_description' => 'nullable|max:250',
           'meta_tags' => 'nullable|max:250',

           'og_meta_title' => 'nullable|max:250',
           'og_meta_description' => 'nullable|max:250',
           'og_meta_tags' => 'nullable|max:250',
           'og_meta_image' => 'nullable|max:250',
       ]);
            // return $request->all();

       AppHelper::filterInputAfterValidation($request);

            DB::beginTransaction();

            try{
                
                $blog->admin_id = auth('admin')->user()->id;
                $blog->category_id = $request->category;
                $blog->title = $request->title;
                $blog->slug = $request->slug;
                $blog->excerpt = $request->excerpt;
                $blog->description = $request->description;
    
                $blog->image = $request->image;
                $blog->attachment = $request->attachment;
                $blog->attachment_type = $request->attachment_type;
    
                $blog->authors = $request->authors;
                $blog->meta_title	 = $request->meta_title	;
                $blog->meta_description = $request->meta_description;
                $blog->meta_tags = $request->meta_tags;
    
                $blog->og_meta_title	 = $request->og_meta_title	;
                $blog->og_meta_description = $request->og_meta_description;
                $blog->og_meta_tags = $request->og_meta_tags;
                $blog->og_meta_image = $request->og_meta_image;
    
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
