<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function day(int $id)
    {
        $day = Calendar::where('id' , $id)->first();

        //TODO:Check if date is valid!

        return view('day', ['day' => $day]);
    }
}
