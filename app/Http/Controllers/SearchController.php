<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Search;

class SearchController extends Controller
{
    //
    public function index(Request $request) {

        $courses = [];

        if($request->search_query) {

            $courses = Course::select('id', 'title', 'description', 'featured_img_url')
                                ->where('title', 'like', '%'. $request->search_query .'%')
                                ->whereNotNull('published_at')
                                ->get();
        }

        return view('frontend.search')
                    ->with('search_query', $request->search_query)
                    ->with('courses', $courses);

    }

}
