@extends('auth.layout-auth.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('fe/daftar.css') }}" />
@endpush
@section('content')
    <div class="container">
        <div class="gambar">
            <h1>
                Ayo Kelola Keuangan <span><br />Anda bersama kami </span>
            </h1>
            <img src="techny-data-privacy-and-security-on-laptop 1.png" alt="" />
        </div>

        <div class="form">
            <h1>Daftar</h1>
            <form method="POST" action="{{ url('/register') }}">
                @csrf
                <div class="Field-User ">
                    <label class="label-namaPengguna">Nama Pengguna</label><br />
                    @error('name')
                        <div class="label-namaPengguna text-danger">{{ $message }}</div><br>
                    @enderror
                    <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" />
                    <img src="img/icon/User.png" class="img-field" alt="" />

                </div>

                <div class="field-email">
                    <label class="label-email">Email</label><br />
                    @error('email')
                        <div class="label-email text-danger">{{ $message }}</div><br>
                    @enderror
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" />
                    <img src="img/icon/email1.png" class="img-field" alt="" />

                </div>

                <div class="field-kataSandi">
                    <label class="label-kataSandi">Kata Sandi</label><br />
                    @error('password')
                        <div class="label-kataSandi text-danger">{{ $message }}</div> <br>
                    @enderror
                    <input type="password" name="password" placeholder="Password" />
                    <img src="img/icon/password.png" class="img-field" alt="" />

                </div>

                <div class="field-kataSandi">
                    <label class="label-kataSandi">Konfirmasi Kata Sandi</label><br />
                    <input type="password" name="password_confirmation" placeholder="Password" />
                    <img src="img/icon/password.png" class="img-field" alt="" />
                </div>

                <div class="field-telepon">
                    <label class="label-telepon">No Telepon</label><br />
                    @error('phone_number')
                        <div class="label-telepon text-danger">{{ $message }}</div> <br>
                    @enderror
                    <input type="text" name="phone_number" placeholder="Nomer Telepon"
                        value="{{ old('phone_number') }}" />
                    <img src="img/icon/telepn.png" class="img-field" alt="" />

                </div>

                <div class="field-telepon">
                    <label class="label-telepon">Alamat</label><br />
                    @error('address')
                        <div class="label-telepon text-danger">{{ $message }}</div> <br>
                    @enderror
                    <input type="text" name="address" placeholder="Alamat" value="{{ old('address') }}" />
                    <img src="img/icon/telepn.png" class="img-field" alt="" />
                </div>

                <button name="login" class="btnDaftar">Daftar</button>
            </form>
        </div>
    </div>
@endsection
