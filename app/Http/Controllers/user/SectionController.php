<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\services\sectionService;
class SectionController extends Controller
{
   private $sectionService;
    public function __construct(sectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    public function index($slug)
    {
      $data =  $this->sectionService->index($slug);
        return view('section', compact('data'));
    }
}
