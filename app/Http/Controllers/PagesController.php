<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $people = ['Amin', 'Ali', 'Mahdi'];
        return view('about', ['people'=>$people]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function exception()
    {
        return view('exception');
    }
}
