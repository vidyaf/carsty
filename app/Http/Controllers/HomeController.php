<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'cars' => Car::all()
        ];
        return view('home.index', $data);
    }

    public function detail(Car $car)
    {
        $data = [
            'car' => $car
        ];
        return view('home.detail', $data);
    }

    public function transaction()
    {
        $data = [
            'transactions' => Transaction::where('user_id', auth()->user()->id)->get()
        ];

        return view('home.transaction', $data);
    }
}
