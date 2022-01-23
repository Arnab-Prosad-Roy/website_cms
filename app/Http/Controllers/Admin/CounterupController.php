<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Counterup;
use Illuminate\Http\Request;
use Session;
use DB;

class CounterupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counterups = Counterup::get();
        return view('backend.counterup.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.counterup.create',get_defined_vars());
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
            'total' => 'required|max:250',
            'status' => 'nullable',
        ]);


        DB::beginTransaction();

        try{
            $counterup = new Counterup();
            $counterup->admin_id = auth('admin')->user()->id;
            $counterup->title = $request->title;
            $counterup->total = $request->total;
            $counterup->status = isset($request->status) ? $request->status : 1 ;
            $counterup->save();
            
            DB::commit();
            $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.counterup.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counterup  $counterup
     * @return \Illuminate\Http\Response
     */
    public function show(Counterup $counterup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counterup  $counterup
     * @return \Illuminate\Http\Response
     */
    public function edit(Counterup $counterup)
    {
        return view('backend.counterup.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counterup  $counterup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counterup $counterup)
    {
        $this->validate($request, [
            'title' => 'nullable|max:250',
            'total' => 'required|max:250',
            'status' => 'nullable',
        ]);


        DB::beginTransaction();

        try{
            $counterup->admin_id = auth('admin')->user()->id;
            $counterup->title = $request->title;
            $counterup->total = $request->total;
            $counterup->status = isset($request->status) ? $request->status : 1 ;
            $counterup->save();
            
            DB::commit();
            $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.counterup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counterup  $counterup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counterup $counterup)
    {
        //
    }
}
