<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;

class ApplicationConrtoller extends Controller
{
    public function store(ApplicationRequest $request){
        $data = $request->validated();

        $time_limit = now()->subMinutes(3);
        if(Application::where('email', $data['email'])->where('created_at', '>', $time_limit)->exists()){
            return response()->json(['message' => 'Вы слишком часто отправляете заявки, попробуйте позже'], 403);
        }

        if(Application::create($data)){
            return response()->json(['message' => 'Заявка была отправлена!'], 200);
        }else{
            return response()->status(403);
        }
    }
}
