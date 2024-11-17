@extends('layout-fe.app')
@push('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fe/booking.css') }}">
@endpush
@section('content')
    <section class="booking">
        <div class="container-booking mt-5">
            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <div class="">
                <div class="card-body">
                    <h2 class="text-center mb-4">FORM BOOKING</h2>
                    <form action="{{ url('/user-booking') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="noTelp">No Telepon</label>
                                <input type="text" class="form-control" id="noTelp" name="phone_number"
                                    value="{{ old('phone_number') }}" placeholder="Nomor Telepon">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="address"
                                    value="{{ old('address') }}" placeholder="Alamat">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="date"
                                    value="{{ old('date') }}">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="waktu">Pilih Waktu</label>
                                <select name="time_id" id="time_id" class="form-control">
                                    <option value="" hidden>--Pilih</option>
                                    @foreach ($times as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('time_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->time_slot }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lapangan">Pilih Lapangan</label>
                                <select name="futsal_court_id" id="futsal_court_id" class="form-control">
                                    <option value="" hidden>--Pilih--</option>
                                    @foreach ($futsal_courts as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('time_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pembayaran">Pembayaran</label>
                                <input type="file" class="form-control " id="pembayaran" id="formFileSm" name="payment"
                                    placeholder="Metode Pembayaran">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>



        <div class="container-infobooking">
            <h3 class="text-center mb-4">UNTUK PEMBAYARAN MINIMUN 50% DARI HARGA PEMESANAN</h3>
            <div class="payment-option">
                <h5>BCA</h5>
                <input type="text" class="form-control" placeholder="989XXXXXXXX" readonly>
            </div>
            <div class="payment-option">
                <h5>DANA</h5>
                <input type="text" class="form-control" placeholder="089XXXXXXXX" readonly>
            </div>
            <div class="payment-option">
                <h5>BRI</h5>
                <input type="text" class="form-control" placeholder="2123XXXXXXXX" readonly>
            </div>
        </div>

    </section>
@endsection
