<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $data = [
            'categories' => Category::paginate(8)
        ];

        return view('livewire.categories', $data);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
