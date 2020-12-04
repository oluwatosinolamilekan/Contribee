<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Helpers\ModelScope;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public const TypeOne  = 1;

    public function index() 
    {
        SEOMeta::setTitle('Tasty-biscuits.com');
        SEOMeta::setDescription('Welcome to biscuits shop!');
        SEOMeta::generate();
        
        // All SEOMeta doesnt not exist....
        if(Auth::User()) { # U with capital letter instead of small letter...
            return redirect('/home');
        } else { 
            $categories = DB::table('content_categories')->where('featured', 1)->get();
            return view('frontpage/home', compact('categories'));
        }
    }

    // reverse of what i change in the index method...
    public function chanageCodeIndex() 
    {
        if(Auth::user()) { # U with capital letters..
            #might decided to return to route since it redirecting...
            return redirect()->route('home');
        } else { 
            #feature method already called a trait and it been included inside the Category Model...
            $categories = Category::feature(self::TypeOne)->get(); #inside this category model table name has been specify..
            return view('frontpage/home', compact('categories'));
        }
    }
}
