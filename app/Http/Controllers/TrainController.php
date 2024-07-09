<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;

class TrainController extends Controller
{
    public function index()
    {
        $oggi = date('Y-m-d');
        $treni = Train::whereDate('orario_di_partenza', $oggi)->get();
        return view('trains.index', compact('treni'));
    }
}
