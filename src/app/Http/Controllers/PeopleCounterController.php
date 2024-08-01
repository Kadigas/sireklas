<?php

namespace App\Http\Controllers;

use App\Jobs\DeleteImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PeopleCounterController extends Controller
{
    public function fetchAPI()
    {
        $data = Http::get("http://127.0.0.1:8080/")->body();
        $dData = json_decode($data);
        return view('fastapi', compact('dData'));
    }

    public function uploadImage(Request $request)
    {
        $img = $request->image;
        $folderPath = "public/images/";

        $currentTime = Carbon::now();
        // $timeToDelete = $currentTime->addSeconds(5);

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = time() . '.png';

        $file = $folderPath . $fileName;

        Storage::put($file, $image_base64);

        return response()->json([
            'success'   => 'Image Upload Successfully',
            'uploaded_image' => $fileName,
            'class_name'  => 'alert-success'
        ]);
    }

    public function countPeople($path)
    {
        $data = Http::get("http://127.0.0.1:8080/predict", [
            'model' => 'yolov8n',
            'file' => $path,
            ])->body();
        $dData = json_decode($data);
        return response()->json([
            'person'   => $dData->person,
        ]);
    }
}
