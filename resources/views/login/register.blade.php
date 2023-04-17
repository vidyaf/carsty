@extends('login.layouts.layout')

@section('content')
    <section id="register">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card shadow rounded-4">
                        <div class="card-body p-3">
                            <h5 class="card-title text-center mb-3">Register</h5>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input value="{{ old('name') }}" type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        aria-describedby="emailHelp">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input value="{{ old('email') }}" type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        aria-describedby="emailHelp">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="noHp" class="form-label">Nomer Handphone</label>
                                    <input value="{{ old('noHp') }}" type="number" name="noHp"
                                        class="form-control @error('noHp') is-invalid @enderror" id="noHp"
                                        aria-describedby="noHpHelp">
                                    @error('noHp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button type="submit"
                                        class="btn btn-info text-white rounded-4 fw-bold">Register</button>
                                </div>
                            </form>
                            <div class="row my-3">
                                <a href="{{ route('login') }}" class="text-center">login ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
