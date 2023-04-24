<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class multiAuth extends Controller
{
    //

    public function admin()
    {
        return view("admin");
    }
    public function student()
    {
       return view("student");
    }
}
