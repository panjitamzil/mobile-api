<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicroController extends Controller
{
  public function componentComplaint () {
    return response()->json(
      [
          "status" => 200,
          "data" => [
            'NVH',
            'Body',
            'Engine',
            'Transmisi',
            'Electrical',
            'Lain-lain',
            'Chassis',
          ]
      ],
      200
    );
  }
}
