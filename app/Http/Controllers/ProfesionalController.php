<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesionalController extends Controller
{
    public function panel(){
        return view('profesional.dashboard');
    }
}
