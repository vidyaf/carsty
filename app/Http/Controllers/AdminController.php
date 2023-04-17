<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'cars' => Car::all(),
            'transactions' => Transaction::all()
        ];
        return view('admin.index', $data);
    }

    public function mobil()
    {
        $data = [
            'categories' => Category::all(),
            'conditions' => Condition::all(),
        ];
        return view('admin.cars', $data);
    }

    public function mobilDetail(Car $car)
    {
        $data = [
            'car' => $car
        ];
        return view('admin.mobil-detail', $data);
    }

    public function mobilEdit(Car $car)
    {
        $data = [
            'car' => $car,
            'categories' => Category::all(),
            'conditions' => Condition::all()
        ];
        return view('admin.mobil-edit', $data);
    }

    public function transaction()
    {
        return view('admin.transactions');
    }

    public function transactionDetail(Transaction $transaction)
    {
        $data = [
            'transaction' => $transaction
        ];
        return view('admin.transaction-detail', $data);
    }

    public function category()
    {
        return view('admin.category');
    }

    public function transactionPrint(Request $request)
    {
        $request->validate([
            'date' => 'required'
        ]);

        $transaction = Transaction::where('created_at', 'like', '%' . $request->date . '%')->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.transaction-print', ['transactions' => $transaction]);

        return $pdf->stream();
    }
}
