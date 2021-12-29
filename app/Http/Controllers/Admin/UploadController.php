<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{
    protected $upload;
    public function __construct(UploadService $upload){
        $this->upload=$upload;
    }
    public function store(Request $request)
    {
        $url=$this->upload->store($request);
        if ($url!=false){
            return respone()->json([
                'error'=> false,
                'url'=> $url
            ]);
        }
        return respone()->json([
            'error'=> true
        ]);
    }
}