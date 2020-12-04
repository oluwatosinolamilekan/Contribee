<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    public function index() {
        SEOMeta::setTitle('Tasty-biscuits.com');
        SEOMeta::setDescription('Welcome to biscuits shop!');
        SEOMeta::generate();
 
        if(Auth::User()) {
            return redirect('/home');
        } else { 
            $categories = DB::table('content_categories')->where('featured', 1)->get();
            return view('frontpage/home', compact('categories'));
        }
    }
}
