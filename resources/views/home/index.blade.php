@extends('home.layouts.layout')

@section('content')
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h3>Cari Mobil Termurah?</h3>
                    <a href="#mobil" class="btn btn-info text-white rounded-4 fw-bold">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <section id="mobil">
        <div class="container py-3">
            <div class="row mb-2">
                <h2 class="text-center">Beli Mobil</h2>
            </div>
            @livewire('buy-cars')
        </div>
    </section>
    <section id="about">
        <div class="container py-5">
            <div class="row text-center">
                <h3 class="fw-bold">Ada Pertanyaan ?</h3>
                <h6>"Silahkan hubungi kami untuk informasi lebih lanjut tentang layanan kami, kami akan menjawab
                    pertanyaan-pertanyaan anda dengan senang hati"</h6>
                <h6>081-393-888-001</h6>
            </div>
        </div>
    </section>
    <section id="location">
        <div class="container py-5">
            <div class="row text-center mb-3">
                <h6 class="fw-bold">Lokasi</h6>
                <h3 class="fw-bold">Lokasi Carsty Showroom</h3>
            </div>
            <div class="row">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3956.3754540534483!2d111.0103059365061!3d-7.423635505504238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1679569823878!5m2!1sid!2sid"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <a href="https://api.whatsapp.com/send?phone=0811111111" class="btn btn-success fw-bold float rounded-circle">
        <i class="bi bi-whatsapp"></i>
    </a>
@endsection
