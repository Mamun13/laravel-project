<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\Service;
use App\Portfolio;
use App\About;

class PageController extends Controller
{
    public function index(){
        $main = Main::first();
        $services = Service::all();
        $services = Portfolio::all();
        $abouts = About::all();
        return view('pages.index', compact('main', 'services','portfolios','abouts'));
    }

     public function dashboard()
     {
         return view('pages.dashboard');
      }
    // public function main()
    // {
    //     return view('pages.main');
    // }
     public function services()
     {
         return view('pages.services');
    }
    public function portfolio()
    {
        return view('pages.portfolio');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
