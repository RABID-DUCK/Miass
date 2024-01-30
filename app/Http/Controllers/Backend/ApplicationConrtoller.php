<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationConrtoller extends Controller
{
    public function index(){
        $apps = Application::all();

        return view('backend.application.index', compact('apps'));
    }

    public function show($id){
        $app = Application::where('id', $id)->first();

        return view('backend.application.edit', compact('app'));
    }

    public function sent(ApplicationRequest $request){
        $data = $request->validated();

    }

}
