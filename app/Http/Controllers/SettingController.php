<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function uploadImage($folder,$image){
        $image->store('/',$folder);
        $filename=$image->hashName();
        $path='assets/img/'.$folder.'/'.$filename;
        return $path;
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=Settings::get()->first();
        return view('settings',compact('settings'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'website_name' => 'required',
            'announcement_expire_period' => 'int|required',
        ]);

        $settings=Settings::get()->first();

        $settings->website_name=$request->website_name;
        $settings->announcement_expire_period=$request->announcement_expire_period;

        if($request->has('website_logo')){
            $path= $this->uploadImage('settings',$request->website_logo);
            $settings->website_logo=$path;
        }

        if($request->has('website_favicon')){
            $path= $this->uploadImage('settings',$request->website_favicon);
            $settings->website_favicon=$path;
        }

        $settings->save();

        return view('settings',compact('settings'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }

}
