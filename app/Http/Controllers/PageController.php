<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function home()    { return view('pages.home'); }
    public function about()   { return view('pages.about'); }
    public function contact() { return view('pages.contact'); }
    public function catalog() { return view('pages.catalog'); }
    public function cart()    { return view('pages.cart'); }
    public function admin()   { return view('pages.admin'); }
}

