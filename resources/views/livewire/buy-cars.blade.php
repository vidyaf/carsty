<div>
    <div class="row mb-5">
        <div class="col-2">
            <label for="#category">Pilih Kategori :</label>
            <select class="form-select rounded-4" wire:model="search" id="category" aria-label="Default select example">
                <option value="" selected>All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-4">
            <label for="#price">Filter Harga :</label>
            <select class="form-select rounded-4" id="price" wire:model="filterPrice"
                aria-label="Default select example">
                <option value="" selected>All</option>
                <option value="100000000-300000000">Rp.100.000.000 - Rp.300.000.000</option>
                <option value="300000000-500000000">Rp.300.000.000 - Rp.500.000.000</option>
                <option value="500000000-700000000">Rp.500.000.000 - Rp.700.000.000</option>
                <option value="700000000-9999999999999999">Rp.700.000.000 ++</option>
            </select>
        </div>
    </div>
    <div class="row row-cols-3 g-3">
        @foreach ($cars as $car)
            <div class="col">
                <div class="card shadow rounded-4">
                    <img style="height:250px" src="{{ asset('storage/' . $car->image) }}" class="card-img-top img-fluid"
                        alt="{{ $car->image }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $car->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($car->price, 2, ',', '.') }}</p>
                        <div class="d-grid">
                            <a href="{{ route('detail', $car->id) }}"
                                class="btn btn-info text-white rounded-4 fw-bold">Lihat
                                Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
