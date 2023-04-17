<?php

namespace App\Http\Livewire;

use App\Models\Car;
use App\Models\Category;
use Livewire\Component;

class BuyCars extends Component
{
    public $search = '';
    public $filterPrice = '';
    public function render()
    {
        if ($this->filterPrice) {
            $price = explode("-", $this->filterPrice);
            $minPrice = (int)$price[0];
            $maxPrice = (int)$price[1];
            $data = [
                'cars' => Car::where('category_id', 'like', '%' . $this->search . '%')->whereBetween('price', [$minPrice, $maxPrice])->get(),
                'categories' => Category::all()
            ];
        } else {
            $data = [
                'cars' => Car::where('category_id', 'like', '%' . $this->search . '%')->get(),
                'categories' => Category::all()
            ];
        }
        return view('livewire.buy-cars', $data);
    }
}
