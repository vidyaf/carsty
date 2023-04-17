<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $rules = $request->validate([
            'car_id' => 'required',
            'user_id' => 'required'
        ]);

        $rules['no_transaction'] = rand(10000, 99999);

        Transaction::create($rules);

        return redirect()->route('detailTransaction', $rules['no_transaction']);
    }

    public function detail(Transaction $transaction)
    {
        $data = [
            'transaction' => $transaction
        ];
        return view('home.payment', $data);
    }

    public function payment(Request $request, Transaction $transaction)
    {
        $rules = $request->validate([
            'image' => 'required'
        ]);

        if ($request->image) {
            $extension = $request->image->extension();
            $filename = $transaction->user->name . $transaction->no_transaction . '.' . $extension;
            $rules['image'] = $request->file('image')->storeAs('imagePayment', $filename);
        }

        $rules['status'] = 'PAID';

        $transaction->update($rules);

        return back();
    }

    public function delete(Transaction $transaction)
    {
        if (auth()->user()->role == 'admin') {
            if ($transaction->image) {
                Storage::delete($transaction->image);
            }
            $transaction->delete();
            return back();
        } else {
            if (auth()->user()->id == $transaction->user_id) {
                $transaction->delete();
                return redirect()->route('transaction');
            }
        }
    }
}
