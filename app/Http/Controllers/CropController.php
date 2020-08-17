<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CropController extends Controller
{
    function index()
    {
      return view('croppie.crop');
    }

    function cropImage(Request $request)
    {
      $image = $request->image;
      list($type,$image) = explode(';',$image); // แยก type
      list(,$image) = explode(',',$image); // แยก ชื่อภาพ
      $image = base64_decode($image); // ถอดรหัสชื่อภาพที่ถูกเข้ารหัสไว้ด้วย base64
      $dt = Carbon::now();
      // $dt->toDateString();
      $image_name = $dt->toDateString().'-'.time().'.png';
      // echo $image_name;
      $path = public_path('imagecrop/'.$image_name);
      file_put_contents($path,$image);
      return response()->json(['status'=>true]);
    }
}
