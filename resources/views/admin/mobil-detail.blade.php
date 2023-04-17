@extends('admin.layouts.layout')

@section('content')
    <section id="detailMobil">
        <div class="container py-5">
            <div class="row my-3">
                <div class="col">
                    <a href="{{ route('adminMobil') }}" class="btn btn-info text-white  btn-sm rounded-3 fw-bold">Back</a>
                </div>
            </div>
            <div class="row row-cols-2 g-3 align-items-center">
                <div class="col">
                    <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid rounded-4" style="width:80%"
                        alt="{{ $car->image }}">
                </div>
                <div class="col">
                    <h3 class="mb-3">{{ $car->name }}</h3>
                    <h6 class="text-secondary">Kondisi : {{ $car->condition->name }}</h6>
                    <h6 class="mb-3 text-secondary">
                        Kategori :
                        @if ($car->category_id != 0)
                            {{ $car->category->name }}
                        @endif
                    </h6>
                    <h6 class="text-secondary">Deskripsi</h6>
                    {!! $car->description !!}
                    <h6 class="mt-3">Rp. {{ number_format($car->price, 2, ',', '.') }}</h6>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('adminMobilEdit', $car->id) }}"
                                class="btn btn-warning rounded-4 text-white fw-bold" style="width:100%">Edit</a>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('adminMobilDelete', $car->id) }}" class="btn btn-danger rounded-4 fw-bold"
                                style="width:100%">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
