<div>
    <div class="col-12 col-md-4 ms-auto">
        <div class="input-group mb-3 shadow-sm">
            <input type="text" class="form-control" aria-describedby="basic-addon2" wire:model="search"
                placeholder="Masukkan Nama Mobil">
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
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $index => $car)
                    <tr>
                        <th scope="row">{{ $cars->firstItem() + $index }}</th>
                        <td>{{ $car->name }}</td>
                        <td>Rp. {{ number_format($car->price, 2, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('adminMobilDetail', $car->id) }}" class="text-decoration-none">
                                <span class="badge text-bg-info text-white">
                                    Detail
                                </span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $cars->links() }}
    </div>
</div>
