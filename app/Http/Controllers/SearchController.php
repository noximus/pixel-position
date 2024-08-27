<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class SearchController extends Controller
{
    public function __invoke()
    {
        // $jobs = Job::where('title', 'LIKE', '%' . request('q') . '%')->get();
        // alternate method
        $jobs = Job::query()
            ->with(['employer', 'tags'])
            ->where('title', 'LIKE', '%' . request('q') . '%')
            ->get();

        return view('results', ['jobs' => $jobs]);
    }
}
