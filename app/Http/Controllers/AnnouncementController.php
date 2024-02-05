<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;

class AnnouncementController extends Controller
{
    //
    public function index() {

        $announcements = Announcement::with('course')->get();

        return view('admin.announcements.index', [ 'announcements' => $announcements ]);

    }

    public function create() {

        $courses = Course::all();

        return view('admin.announcements.create', [ 'courses' => $courses ]);

    }

    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'course_id' => ['required'],
            'announcement' => ['required'],
        ]);

        Announcement::create($validated);

        return redirect()
                    ->route('admin.announcements.index')
                    ->withSuccess('Announcement created successfully.');;

    }

    public function edit($id) {

        $courses = Course::all();
        $announcement = Announcement::findOrFail($id);

        return view('admin.announcements.edit', 
            ['courses' => $courses],
            ['announcement' => $announcement]
        );

    }

    public function update(Request $request, $id) {

        $validated = $request->validate([
            'course_id' => ['required'],
            'announcement' => ['required'],
        ]);

        Announcement::where('id', $id)->update($validated);

        return redirect()->route('admin.announcements.index')
                        ->withSuccess('Announcement updated successfully.');

    }

    public function destroy($id) {

        Announcement::find($id)->delete();

        return redirect()->route('admin.announcements.index')
                            ->withSuccess('Announcement deleted successfully.');

    }

}
