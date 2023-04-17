@extends('home.layouts.layout')

@section('content')
    <div class="container py-5">
        <div class="row my-3">
            <div class="col">
                <a href="{{ route('home') }}" class="btn btn-info text-white  btn-sm rounded-3 fw-bold">Back</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid rounded-4" style="width:100%"
                    alt="{{ $car->image }}">
            </div>
        </div>
        <hr>
        <div class="row row-cols-2 ">
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
            </div>
            <div class="col">
                <h3 class="fw-bold">Rp. {{ number_format($car->price, 2, ',', '.') }}</h3>
                @if (auth()->check())
                    <form action="{{ route('transactionStore') }}" method="post">
                        @csrf
                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <button type="submit" class="btn btn-info text-white fw-bold">Beli Sekarang</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
