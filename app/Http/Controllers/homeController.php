<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    function about($fName, $mName, $lName){
        return "MY Name is {$fName}{$mName}{$lName}";
    }
    function myname($firstName, $middleName, $lastName){
        return view('Demoview', ['firstkey'=>$firstName, 'middlekey'=>$middleName, 'lastkey'=>$lastName]);
    }
}