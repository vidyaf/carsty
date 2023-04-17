<?php

namespace App\Http\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class Cars extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {

        $data = [
            'cars' => Car::where('name', 'like', '%' . $this->search . '%')->paginate(8)
        ];

        return view('livewire.cars', $data);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
