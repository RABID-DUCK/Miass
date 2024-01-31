<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ApplicationRequest;
use App\Mail\AnswerAppMail;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        if(!isset($data['comment'])){
            return redirect()->back()->withErrors(['msg' => 'Чтобы изменить статус нужно оставить комментарий!']);
        }

        if($app = Application::where('id', $data['id_application'])->first()){
            $app->comment = $data['comment'];
            $app->status = $data['status'];
            $app->save();

            Mail::to($app->email)->send(new AnswerAppMail($app->comment));
            return redirect()->route('app.index');
        }
    }

    public function sort(Request $request){
        $data = $request->validate(['action' => 'required']);
        $apps = null;

        switch ($data['action']) {
            case 'dateDown':
                $apps = Application::orderBy('created_at', 'ASC')->get();
                break;
            case 'dateUp':
                $apps = Application::orderBy('created_at', 'DESC')->get();
                break;
            case 'status':
                $apps = Application::orderBy('status')->get();
                break;
            default:
                break;
        }

        return response()->json(['apps' => $apps]);
    }
}
