<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\CategoryHead;
use App\Category;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Str;
use  App\Helpers\AppHelper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        // return $slug;
      
          $pageTitle =   ucfirst($slug).' Categories';
          $categoryHead =  CategoryHead::where('slug', 'blog')->first();
          $categories =  Category::where('category_head_id', $categoryHead->id)->get();
          return view('backend.category.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $pageTitle =   'Create '.ucfirst($slug).' Category';
        $categoryHead = CategoryHead::where('slug',$slug)->first();
        return view('backend.category.create',get_defined_vars());
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
            'slug' =>  'required|max:300|unique:categories',
            'status' => 'required',

        ]);

// return $request->all();
        DB::beginTransaction();

        try{

            $category = new Category();

            //$category->user_id = auth('admin')->user()->id;
            $category->user_id = '1';
            $category->category_head_id = $request->category_head_id;
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = isset($request->status) ? $request->status : 1 ;
            $category->save();
            
            DB::commit();
            $status = true;
       
        }catch(\Exception  $e){
           return $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.category.index', $request->slug_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$slug)
    {
        $category = Category::find($id);
        $pageTitle =   'Edit '.ucfirst($slug).' Category';
        $categoryHead = CategoryHead::where('slug',$slug)->first();
        return view('backend.category.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // return $category;
        // return $request->all();
        $this->validate($request, [
            'name' => 'required|max:250',
            'slug' =>  'required|max:300|unique:categories,slug,'.$category->id,
            'status' => 'required',

        ]);

// return $request->all();
        DB::beginTransaction();

        try{

           

            //$category->user_id = auth('admin')->user()->id;
            $category->user_id = '1';
            $category->category_head_id = $request->category_head_id;
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->status = isset($request->status) ? $request->status : 1 ;
            $category->save();
            
            DB::commit();
            $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.category.index',$request->slug_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
