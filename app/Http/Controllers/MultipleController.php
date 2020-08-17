<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultipleController extends Controller
{
    function index()
    {
      return view('multiple.upload');
    }

    function upload()
    {
      $imageName= request()->file->getClientOriginalName();
      request()->file->move(public_path('upload-image'), $imageName);
      return response()->json('[uploaded=>/upload-image/'.$imageName.']');
    }
}
