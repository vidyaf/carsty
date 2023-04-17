<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $rules = $request->validate([
            'name' => 'required'
        ]);

        Category::create($rules);
        return back();
    }

    public function delete(Category $category)
    {
        $cars = Car::where('category_id', $category->id)->get();
        foreach ($cars as $car) {
            $car->category_id = 0;
            $car->save();
        }
        $category->delete();
        return back();
    }
}
