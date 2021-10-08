<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        // $services = service::all();
        // return view('pages.services.list',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolios.create');
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
             'title'=>'required|string',
             'sub_title'=>'required|string',
             'big_img'=>'required|image',
             'small_img'=>'required|image',
             'description'=>'required|string',
             'client'=>'required|string',
             'category'=>'required|string',
         ]);

         $portfolios= new Portfolio();
         $portfolios->title = $request->title;
         $portfolios->sub_title = $request->sub_title;
         $portfolios->sub_title = $request->sub_title;
         $portfolios->description = $request->description;
         $portfolios->client = $request->client;
         $portfolios->category = $request->category;

         $big_img=$request->file('big_img');
         Storage::putfile('public/img/',$big_img);
         $portfolios->big_img="storage/img/".$big_img->hashName();


         $small_img=$request->file('small_img');
         Storage::putfile('public/img/',$small_img);
         $portfolios->small_img="storage/img/".$small_img->hashName();

         $portfolios->save();

         return redirect()->route('admin.portfolios.create')->with('success','New Portfolio Created Successfully');
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
        // $services= service::find($id);
        // return view('pages.services.edit', compact('services'));
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
        //  $this->validate($request, [
        //     'icon'=>'required|string',
        //     'title'=>'required|string',
        //     'description'=>'required|string',
        // ]);

        // $services= service::find($id);
        // $services->icon = $request->icon;
        // $services->title = $request->title;
        // $services->description = $request->description;

        // $services->save();

        // return redirect()->route('admin.services.list')->with('success','Service updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $services= service::find($id);
        // $services->delete();

        // return redirect()->route('admin.services.list')->with('success','Service deleted  Successfully'); 
    }
}
