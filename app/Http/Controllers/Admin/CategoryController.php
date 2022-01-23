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
        
          $categories =  AppHelper::getCategory($slug);
          $categoryHead = CategoryHead::where('slug',$slug)->first();
      return view('backend.category.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'slug' =>  'required|max:300|unique:blogs',
            'status' => 'required',

        ]);


        DB::beginTransaction();

        try{

            $category = new Category();

            $category->admin_id = auth('admin')->user()->id;
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
        return \redirect()->route('admin.category.index');
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
    public function edit(Category $category)
    {
        //
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
        //
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
