<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\Storage;

class AboutPagesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
         $abouts = About::all();
         return view('pages.abouts.list',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.abouts.create');
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
             'title1'=>'required|string',
             'title2'=>'required|string',
             'image'=>'required|image',
             'description'=>'required|string',
         ]);

         $abouts= new About;
         $abouts->title1 = $request->title1;
         $abouts->title2 = $request->title2;
         $abouts->description = $request->description;

         $image_file=$request->file('image');
         Storage::putfile('public/img/',$image_file);
         $abouts->image="storage/img/".$image_file->hashName();



         $abouts->save();

         return redirect()->route('admin.abouts.create')->with('success','New abouts Created Successfully');
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
         $about= About::find($id);
         return view('pages.abouts.edit', compact('about'));
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
             'title1'=>'required|string',
             'title2'=>'required|string',
             'description'=>'required|string',
         ]);

         $abouts= About::find($id);
         $abouts->title1 = $request->title1;
         $abouts->title2 = $request->title2;
         $abouts->description = $request->description;


         if($request->file('image')){
            $image_file=$request->file('image');
            Storage::putfile('public/img/',$image_file);
            $abouts->image="storage/img/".$image_file->hashName();
         }
         $abouts->save();

         return redirect()->route('admin.abouts.list')->with('success','New abouts updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio= portfolio::find($id);
        @unlink(public_path($portfolio->big_img));
        @unlink(public_path($portfolio->small_img));
        $portfolio->delete();

        return redirect()->route('admin.portfolios.list')->with('success','Service deleted  Successfully'); 
    }
}
