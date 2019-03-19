<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function candidates()
    {
        return view('candidates.all');
    }

    public function candidate($id)
    {
        return view('candidates.single', ["candidate_id" => $id]);
    }
}
