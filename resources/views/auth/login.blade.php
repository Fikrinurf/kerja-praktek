@extends('auth.layout-auth.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('fe/login.css') }}" />
@endpush
@section('content')
    <section class="container">
        <div class="gambar">
            <h1>
                Ayo Kelola Keuangan <span><br />Anda bersama kami </span>
            </h1>
            <img src="img/loginimg.png" alt="" />
        </div>

        <div class="form">
            @if ($errors->any())
                <script>
                    swal({
                        title: "Upss",
                        text: "{{ $errors->first() }}",
                        type: "error",
                        confirmButtonText: "OK"
                    });
                </script>
            @endif
            <h1>Masuk</h1>
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <button name="btnGoogle" class="btnGoogle"><img src="img/icon/Google.png " class="logo-google"
                        alt="" />Lanjutkan dengan google</button>
                <br />
                <button name="btnFacebook" class="btnFacebook"><img src="img/icon/Facebook.png"
                        class="logo-facebook" />Lanjutkan dengan facebook</button>
                <br />
                <br />
                <label>Email</label><br />
                <input type="text" name="email" class="field-email" value="{{ old('email') }}" /><br />
                <label>Kata Sandi</label><br />
                <input type="password" name="password" class="field-kataSandi" value="{{ old('password') }}" />
                <div class="checkbox">
                    <input type="checkbox" />
                    <label for="">Ingat Saya</label>
                </div>
                <br />
                <button name="login" class="btnLogin">Masuk</button>
                <p>
                    Belum punya akun? Yuk Buat sekarang!
                    <br />
                    <a href="{{ url('/register') }}">Buat akun</a>
                </p>
            </form>
        </div>
    </section>
@endsection
