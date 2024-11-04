@extends('user.layout.apps')
@section('content')
    <h1 class="app-page-title">Booking</h1>
    <div class="app-card app-card-settings shadow-sm p-4">

        <div class="app-card-body">
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
            <form class="settings-form" action="{{ url('/user-booking') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="phone_number" class="form-label">No Telp</label>
                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                        value="{{ old('phone_number') }}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                </div>
                <div class="mb-3">
                    <label for="time_id" class="form-label">Pilih Waktu</label>
                    <select name="time_id" id="time_id" class="form-control">
                        <option value="" hidden>--Pilih</option>
                        @foreach ($times as $item)
                            <option value="{{ $item->id }}" {{ old('time_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->time_slot }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="futsal_court_id" class="form-label">Pilih Lapangan</label>
                    <select name="futsal_court_id" id="futsal_court_id" class="form-control">
                        <option value="" hidden>--Pilih--</option>
                        @foreach ($futsal_courts as $item)
                            <option value="{{ $item->id }}" {{ old('time_id') == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="payment" class="form-label">Payment</label>
                    <input type="file" class="form-control" id="payment" name="payment">
                </div>
                <button type="submit" class="btn app-btn-primary mb-3">Booking</button>
            </form>
        </div>


    </div>

    </div>
@endsection
