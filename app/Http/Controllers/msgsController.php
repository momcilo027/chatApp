<?php

namespace App\Http\Controllers;

use App\Models\Msgs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class msgsController extends Controller
{
    public function store(Request $request){
        $formFields = $request->validate([
            'sent_id' => ['required'],
            'rec_id' => ['required'],
            'msg_text' => ['required']
        ]);

        //Add MSG
        $msg = Msgs::create($formFields);

        return redirect('/?chatWith='.$formFields['rec_id']);
    }
}
