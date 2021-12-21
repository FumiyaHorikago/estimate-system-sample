<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parents;

class ParentsController extends Controller
{
    public function call(){
        return Parents::orderBy('id','asc')->get();
    }
}
