<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service;

class ServicePagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $services = service::all();
        return view('pages.services.list',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.create');
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
            'icon'=>'required|string',
            'title'=>'required|string',
            'description'=>'required|string',
        ]);

        $services= new service();
        $services->icon = $request->icon;
        $services->title = $request->title;
        $services->description = $request->description;

        $services->save();

        return redirect()->route('admin.services.create')->with('success','New Service Created Successfully');
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
        $services= service::find($id);
        return view('pages.services.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'icon'=>'required|string',
            'title'=>'required|string',
            'description'=>'required|string',
        ]);

        $services= service::find($id);
        $services->icon = $request->icon;
        $services->title = $request->title;
        $services->description = $request->description;

        $services->save();

        return redirect()->route('admin.services.list')->with('success','Service updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services= service::find($id);
        $services->delete();

        return redirect()->route('admin.services.list')->with('success','Service deleted  Successfully'); 
    }
}
