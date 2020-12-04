<?php

namespace App\Action;

use App\Models\Message;
use Illuminate\Support\Facades\DB;

class StoreMessage
{

    public function run($request)
    {
        DB::beginTransaction();
        $message = new Message();
        $message->full_name = $request->full_name;
        $message->email = $request->email;
        $message->country_id = $request->country_id;
        $message->save();
        DB::commit();

        return $message;
    }
}
