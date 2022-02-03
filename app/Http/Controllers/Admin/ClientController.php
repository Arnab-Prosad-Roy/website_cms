<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Client;
use Illuminate\Http\Request;
use Session;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::get();
        return view('backend.client.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.client.create',get_defined_vars());
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
            $client = new Client();
       
        if($request->hasFile('image')){
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/clients/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $client->image =  $imageFullPath;
        }
      

        //$client->admin_id = auth('admin')->user()->id;
        $client->user_id = '1';
        $client->name = $request->name;
        $client->site_url = $request->site_url;
        $client->status = isset($request->status) ? $request->status : 1 ;
        $client->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Saved Successfully..');
        return \redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('backend.client.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
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
            @unlink(public_path().'/'.$client->image);
            $originalImage = $request->file('image');
            $imageName = uniqid().time().'.'.$originalImage->getClientOriginalExtension();
            $imagePath = 'assets/images/clients/';
            $imageFullPath = $imagePath.$imageName;
            $originalImage->move(public_path().'/'.$imagePath,$imageName);
            $client->image =  $imageFullPath;
        }
      

        //$client->admin_id = auth('admin')->user()->id;
        $client->user_id = '1';
        $client->name = $request->name;
        $client->site_url = $request->site_url;
        $client->status = isset($request->status) ? $request->status : 1 ;
        $client->save();
        
        DB::commit();
        $status = true;
       
        }catch(\Exception  $e){
            $message = $e->getMessage();
            DB::rollback();
            $status = false;
            return back()->with('error','Please fill out form correctly...');
        }
        Session::flash('success','Information Upated Successfully..');
        return \redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
