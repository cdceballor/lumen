<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class RandomImageController extends BaseController
{
    public static $images = array(
        "1.jpg",
        "2.jpg",
        "3.jpg",
        "4.jpg",
        "5.jpg",
        "6.jpg",
        "7.jpg",
        "8.png",
        "10.jpg",
    );

    public function showImages()
    {
        $totalImages = (count(RandomImageController::$images));
        $randomNumber = (rand(0, ($totalImages - 1)));
        $data['image_name'] = RandomImageController::$images[$randomNumber];
        $data['ip'] = gethostbyname(gethostname());
        $data['storage'] = Storage::disk('s3');

        return view('RandomImages.index')->with('data',$data);
    }
}
