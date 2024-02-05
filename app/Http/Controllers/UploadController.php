<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    //
    public function index(Request $request) 
    {

        if($request->filled('upload_type')) {

            $url = "";
            $upload_type = $request->upload_type;


            if($upload_type == 'video') {

                $path = Storage::putFile('videos', $request->file);

                $url = Storage::url($path);

                return $url;

            }

            if($upload_type == 'image') {

                $path = Storage::putFile('images', $request->file);

                $url = Storage::url($path);

                return $url;

            }

            if($upload_type == 'subtitle') {

                if($request->file->getClientOriginalExtension() != 'srt') {

                    return response()->json([

                        'message' => 'File format not supported.'

                    ], 500);

                }

                $path = Storage::putFileAs('subtitles', $request->file, Str::random(40) . '.srt');

                $url = Storage::url($path);

                return $url;

            }

            if($upload_type == 'media_tracker') {

                if($request->file->getClientOriginalExtension() != 'vtt') {

                    return response()->json([

                        'message' => 'File format not supported.'
                        
                    ], 500);

                }

                $path = Storage::putFileAs('media-trackers', $request->file, Str::random(40) . '.vtt');

                $url = Storage::url($path);

                return $url;

            }

        }

    }

}
