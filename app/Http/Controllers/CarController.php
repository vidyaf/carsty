<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        $rules = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'condition_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|file|max:1024'
        ]);

        if ($request->image) {
            $extension = $request->image->extension();
            $filename = rand(00000, 99999) . '.' . $extension;
            $rules['image'] = $request->file('image')->storeAs('image', $filename);
        }

        Car::create($rules);
        return redirect()->route('adminMobil')->with('success', 'Berhasil menambahkan data mobil');
    }

    public function delete(Car $car)
    {
        if ($car->image) {
            Storage::delete($car->image);
        }
        $car->delete();
        return redirect()->route('adminMobil')->with('success', 'Berhasil menghapus data mobil');
    }

    public function update(Request $request, Car $car)
    {
        $rules = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'condition_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $extension = $request->image->extension();
            $filename = rand(00000, 99999) . '.' . $extension;
            $rules['image'] = $request->file('image')->storeAs('image', $filename);
        }


        $car->update($rules);
        return redirect()->route('adminMobil')->with('success', 'Berhasil mengubah data mobil');
    }
}
