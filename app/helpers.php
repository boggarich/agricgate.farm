<?php 

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