<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillCollection;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    //
    public function get(): SkillCollection
    {
        $job = Skill::query()->select(['id', 'name'])->get();
        return new SkillCollection($job);
    }
}
