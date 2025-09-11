<?php

namespace App\services;

use App\repository\sectionRepository;
class sectionService
{
    private $sectionRepository;
    public function __construct(sectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function index($slug)
    {
        $data =  $this->sectionRepository->index($slug);

        if(!$data) {
            return redirect()->route('home');
        }

        return $data;
    }
}