<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index(){

        $sections = Section::all();

        return view('sections/index', [ 'sections' => $sections ]);
    }
}
