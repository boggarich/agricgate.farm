<?php 

    use Stichoza\GoogleTranslate\GoogleTranslate;
    use Illuminate\Support\Facades\Session;

    if(! function_exists('generate_youtube_video_id') ) {


        function generate_youtube_video_id($youtube_url) {

            $video_id = explode('?v=', $youtube_url)[1];

            return $video_id;

        }

    }

    if (! function_exists('translate')) {

        function translate($content) { 

            $target = 'en';
            $source = 'en';

            if(Session::get('locale')) {

                $target = Session::get('locale');

            }

            return GoogleTranslate::trans($content, $target, $source);

        }

    }

    if (! function_exists('time_since')) {

        function time_since($date) {
            
            $time = time() - strtotime($date);

            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );

            foreach ($tokens as $unit => $text) {

                if ($time < $unit) continue;

                $numberOfUnits = round($time / $unit);

                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':''). ' ago';
            }


        }

    }

    if(! function_exists('format_date')) {

        function format_date($date) {

            $timestamp = strtotime($date);

            $date = date("M d, Y.", $timestamp);

            return $date;

        }

    }