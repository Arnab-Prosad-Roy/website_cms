<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\PostType;

use Image;
use Session;
use  DB;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('backend.post.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $postTypes = PostType::get();
        return view('backend.post.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->rules());
      
        DB::beginTransaction();

        try{
            $post = new Post();
       
        if($request->hasFile('image')){
 
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/property-area/images/';
            $image = Image::make($originalImage);
             $image->resize(480,230);
           
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $post->image =  $imagePath.$imageName;
        }

        if($request->hasFile('thumbnail')){
 
            $originalImage = $request->file('thumbnail');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/post/thumbnail/';
            $image = Image::make($originalImage);
           
            $image->resize(350,250);
           
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $post->thumbnail =  $imagePath.$imageName;
        }

        $post->post_type_id = $request->post_type_id;
        $post->admin_id = auth('admin')->user()->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;
        $post->meta_title	 = $request->meta_title	;
        $post->meta_description = $request->meta_description;
        $post->status = isset($request->status) ? $request->status : 1 ;
        $post->save();


        
       


        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
          return  $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::get();
        $postTypes = PostType::get();
        return view('backend.post.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $this->validate($request,$this->rules($post->id));

        DB::beginTransaction();

        try{
        
        if($request->hasFile('image')){
 
             $this->globalImageUnlink($post->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/property-area/images/';
            $image = Image::make($originalImage);
             $image->resize(480,230);
           
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $post->image =  $imagePath.$imageName;
        }

        if($request->hasFile('thumbnail')){

            $this->globalImageUnlink($post->thumbnail);
            $originalImage = $request->file('thumbnail');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'frontend/images/post/thumbnail/';
            $image = Image::make($originalImage);
           
            $image->resize(350,250);
           
            $imageFullPath = $imagePath.$imageName;
            $this->globalImageSave($image,$imageFullPath);

            $post->thumbnail =  $imagePath.$imageName;
        }

        
        $post->post_type_id = $request->post_type_id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->slug = $request->slug;
        $post->meta_title	 = $request->meta_title	;
        $post->meta_description = $request->meta_description;
        $post->status = $request->status;
        $post->save();

        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
private function rules($id=null){
          
       return [
            'title' => 'required|max:250',
            'slug' => !isset($id) ? 'nullable|max:300|unique:posts' :'nullable|max:300|unique:posts,slug,'.$id,

            'description' => 'nullable',
            'post_type_id'=>'required',

            'meta_title' => 'nullable|max:120',
            'meta_description' => 'nullable|max:300',
            'meta_tags' => 'nullable|max:300',

            'status' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg',
        ];
    }
}
