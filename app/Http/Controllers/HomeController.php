<?php

namespace App\Http\Controllers;

use App\Makale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    public function index()
    {
        $makaleler = Makale::where("durum",1)->orderBy("created_at","desc")->paginate(10);
        return view('anasayfa',compact('makaleler'));
    }

   /*public function userProfile( $user){
        dd($user->name);
   }*/
}
