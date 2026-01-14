<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Display the sales channels page.
     *
     * @return \Illuminate\View\View
     */
    public function salesChannels()
    {
        return view('pages.sales-channels');
    }

    /**
     * Display the brands page.
     *
     * @return \Illuminate\View\View
     */
    public function brands()
    {
        return view('pages.brands');
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.contact');
    }
}
