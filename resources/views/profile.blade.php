@extends('layout.app')
@section('content')
    @include('default')


    <div class="container-sm mt-5">
        <div class="row">
            <hr>
            <h1>Biodata Diri</h1>
            <hr>
            <div class="col-md-auto">
                <h4>Nama Lengkap</h4>
                <h4>Nama Panggilan</h4>
                <h4>Tempat Tanggal</h4>
                <h4>e-Mail</h4>
                <h4>Kelas</h4>
                <h4>Jurusan</h4>
                <h4>Universitas</h4>
            </div>
            <div class="col">
                <h4>: Wahyu Ade Cahaya</h4>
                <h4>: Wahyu</h4>
                <h4>: Pasuruan, 17 Desember 2003</h4>
                <h4>: immerased@gmail.com</h4>
                <h4>: IS-05-02</h4>
                <h4>: Sistem Informasi</h4>
                <h4>: Telkom University Surabaya</h4>
            </div>
            <div class="col">
                <img class="img-thumbnail" src="{{ Vite::asset('resources/img/aku.png') }}" alt="image" height="" width="">
            </div>
        </div>

    </div>
@endsection
