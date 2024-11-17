@extends('owner.layout.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
    <h1 class="app-page-title">Dashboard</h1>
    <div class="row mb-2">
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title ">Jumlah User</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Booking</h5>
                    <p class="card-text">{{ $bookingCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Lapangan</h5>
                    <p class="card-text">{{ $lapanganCount }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-dark bg-white">
                <div class="card-body">
                    <h5 class="card-title ">Jumlah Admin</h5>
                    <p class="card-text">{{ $adminCount }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
