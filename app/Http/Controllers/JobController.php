<?php

namespace App\Http\Controllers;

use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    //
    public function get(): JobCollection
    {
        $job = Job::query()->select(['id', 'name'])->get();
        return new JobCollection($job);
    }
}
