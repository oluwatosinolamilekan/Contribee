<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Country;
use App\Action\StoreMessage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function index()
    {
        $countries = Country::all();
        return view('form', compact('countries'));
    }


    public function store(StoreMessageRequest $request)
    {
       try {
           $storeMessage = (new StoreMessage())->run($request);
           $countryName = Country::where('id',$request->country_id)->first()->name;
           return response()->json([
            'country' => $countryName
           ]);
       } catch (Exception $e) {
           return response()->json($e->getMessage());
       }
    }
}
