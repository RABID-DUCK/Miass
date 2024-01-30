<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationConrtoller extends Controller
{
    public function store(ApplicationRequest $request){
        $data = $request->validated();
        if(Application::create($data)){
            return response()->json(['message' => 'Заявка была оправлена!'], 200);
        }else{
            return response()->status(403);
        }
    }
}
