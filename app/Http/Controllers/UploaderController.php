<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UploaderController extends Controller
{
    public function index (Request $request) {
        $file = Input::file('file');
        $filename = time(). '-' . $file->getClientOriginalName();
        $file = $file->move(public_path().'/uploads/', $filename);

        return response()->json(
            [
                "status" => 200,
                "data" => '/uploads/'.$filename
            ],
            200
        );
    }
}
