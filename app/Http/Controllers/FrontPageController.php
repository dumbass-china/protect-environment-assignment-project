<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Donation;
use App\Models\WhatWeDo;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::get();
        $data['aboutus'] = AboutUs::get();
        $data['whatwedo'] = WhatWeDo::get();
        $data['donation'] = Donation::get();
        return view('front-protect-environment.index',$data);
    }
    public function about()
    {
        $data['title'] = "About Us";
        $data['aboutus'] = AboutUs::get();
        return view('front-protect-environment.front-about',$data);
    }
    public function services()
    {
        $data['title'] = "Our Servicess";
        return view('front-protect-environment.front-services',$data);
    }
    public function causes()
    {
        $data['title'] = "Recent Causes";
        return view('front-protect-environment.front-causes',$data);
    }
    public function events()
    {
        $data['title'] = "Upcoming Events";
        return view('front-protect-environment.front-events',$data);
    }
    public function blog()
    {
        $data['title'] = "Latest News & Blog";
        return view('front-protect-environment.front-blog',$data);
    }
    public function gallery()
    {
        $data['title'] = "Image Gallery";
        return view('front-protect-environment.front-gallery',$data);
    }
    public function contact()
    {
        $data['title'] = "Contact Us";
        return view('front-protect-environment.front-contact',$data);
    }
    public function volunteers()
    {
        $data['title'] = "Our Volunteers";
        return view('front-protect-environment.front-volunteers',$data);
    }
    public function donation()
    {
        $data['title'] = "Donation";
        return view('front-protect-environment.front-donation',$data);
    }
}
