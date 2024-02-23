<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Finller\AwsMediaConvert\Facades\AwsMediaConvert;
use Finller\AwsMediaConvert\Support\DefaultMediaConvertSettings;
use Finller\AwsMediaConvert\Support\Hls\DefaultHlsMediaConvertGroup;
use Finller\AwsMediaConvert\Support\Hls\DefaultHls1080pMediaConvertOutput;
use Finller\AwsMediaConvert\Support\Hls\DefaultHls720pMediaConvertOutput;
use Finller\AwsMediaConvert\Support\Hls\DefaultHls540pMediaConvertOutput;
use Finller\AwsMediaConvert\Support\Hls\DefaultHls480pMediaConvertOutput;



class UploadController extends Controller
{
    //
    public function index(Request $request) 
    {

        $destination = env('AWS_MEDIACONVERT_DESTINATION');

        if($request->filled('upload_type')) {

            $url = "";
            $upload_type = $request->upload_type;


            if($upload_type == 'video') {

                $path = Storage::putFile('videos', $request->file);

                $url = Storage::url($path);

                $response = AwsMediaConvert::createJob(
                    settings: DefaultMediaConvertSettings::make($url)
                        ->addOutputGroup(
                            DefaultHlsMediaConvertGroup::make($destination)
                                ->addOutputWhen(true, DefaultHls1080pMediaConvertOutput::make())
                                ->addOutputWhen(true, DefaultHls720pMediaConvertOutput::make())
                                ->addOutputWhen(true, DefaultHls540pMediaConvertOutput::make())
                                ->addOutputWhen(true, DefaultHls480pMediaConvertOutput::make())
                        )
                        ->toArray(),
                    metaData: []
                );

                $aws_hls_converted_media_url = Storage::url(explode('.', $path)[0].'.m3u8');

                return $aws_hls_converted_media_url;

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

            if($upload_type == 'exercise_file') {

                $path = Storage::putFile('exercise-files', $request->file);

                $url = Storage::url($path);

                return $url;

            }



        }

    }

}
