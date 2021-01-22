<?php

namespace App\Http\Controllers;

use App\Models\Recalculation;
use Illuminate\Http\Request;

class RecalculationController extends Controller
{
    public function index()
    {
        $calculations = Recalculation::query()->paginate(6);
        return view('index',compact('calculations'));
    }
}
