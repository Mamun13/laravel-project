<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use Illuminate\Support\Facades\Storage;

class MainPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main = Main::first();
        return view('pages.main', compact('main'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string',
            'sub_title'=>'required|string',
        ]);

        $main=Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img/','bc_img'. $img_file->getClientOriginalExtension());
            $main->bc_img = 'Storage/img/bc_img' .  $img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/','resume'. $pdf_file->getClientOriginalExtension());
            $main->resume = 'Storage/pdf/resume' .  $pdf_file->getClientOriginalExtension();
        }

        $main->save();

        return redirect()-> route('admin.main')->with('success',"Main page data update successfully");



    }

   
}
