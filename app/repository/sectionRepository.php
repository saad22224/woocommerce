<?php

namespace App\repository;

use App\Models\Section;

class sectionRepository
{
    public function index($slug)
    {
        $section =  Section::where('name', $slug)->firstOrFail();
        $data = $section->products()->get();
        return $data;
    }
}
