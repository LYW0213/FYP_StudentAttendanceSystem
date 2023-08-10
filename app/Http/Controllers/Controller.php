<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public $userimage = 'userimage/';

    public function createFolder($path)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }

    public function createUniqueFileName($id, $original_file_name)
    {
        $random_str = Str::random(5);
        $time_now = Carbon::now();
        $write_time = $time_now->format('YmdHis');
        $file_name = $random_str.'_'.$write_time.'_'.$id.'_'.$original_file_name;
        return $file_name;
    }

    public function deleteFile($file_path)
    {
        if (File::exists($file_path)) {
            File::delete($file_path);
        }
    }
}
