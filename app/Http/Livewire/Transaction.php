<?php

namespace App\Http\Livewire;

use App\Models\Transaction as ModelsTransaction;
use Livewire\Component;
use Livewire\WithPagination;

class Transaction extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function render()
    {

        $data = [
            'transactions' => ModelsTransaction::where('no_transaction', 'like', '%' . $this->search . '%')->latest()->paginate(8)
        ];

        return view('livewire.transaction', $data);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
