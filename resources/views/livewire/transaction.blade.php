<div>
    <div class="col-12 col-md-4 ms-auto">
        <div class="input-group mb-3 shadow-sm">
            <input type="text" class="form-control" aria-describedby="basic-addon2" wire:model="search"
                placeholder="Masukkan Nomer Transaksi">
            <span class="input-group-text bg-success text-white " id="basic-addon2">
                <i class="bi bi-search"></i>
            </span>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Transaksi</th>
                    <th scope="col">Waktu Transaksi</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $index => $transaction)
                    <tr>
                        <th scope="row">{{ $transactions->firstItem() + $index }}</th>
                        <td>{{ $transaction->no_transaction }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>
                            <a href="{{ route('adminTransactionDetail', $transaction->no_transaction) }}"
                                class="text-decoration-none">
                                <span class="badge text-bg-info text-white">
                                    Detail
                                </span>
                            </a>
                            <a href="{{ route('adminTransactionDelete', $transaction->no_transaction) }}"
                                class="text-decoration-none">
                                <span class="badge text-bg-danger text-white">
                                    Delete
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>
