@extends('admin.layout.app')
@section('content')
    <h1 class="app-page-title">Detail Bookings</h1>
    {{-- success alert --}}
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade active show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table mb-5">

                <div class="app-card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" id="dataTable">
                            <tr>
                                <th width="250px">Nama</th>
                                <td>: {{ $bookings->name }}</td>
                            </tr>
                            <tr>
                                <th>No Telp</th>
                                <td>: {{ $bookings->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $bookings->address }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Main</th>
                                <td>: {{ $bookings->date }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($bookings->status == 1)
                                        <span class="badge bg-success">Sudah Bayar</span>
                                    @else
                                        <span class="badge bg-danger">Belum Bayar</span>
                                    @endif
                                    <!-- Button untuk memunculkan modal -->
                                    <button type="button" class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal"
                                        data-bs-target="#statusModal">
                                        Ubah Status
                                    </button>
                            </tr>
                            <tr>
                                <th>Jam</th>
                                <td>: {{ $bookings->time->time_slot }}</td>
                            </tr>
                            <tr>
                                <th>Lapangan</th>
                                <td>: {{ $bookings->futsal_court->name }}</td>
                            </tr>
                            <tr>
                                <th>Bukti Pembayaran</th>
                                <td>
                                    <a href="{{ asset('storage/payment/' . $bookings->payment) }}" target="_blank"
                                        rel="noopener noreferrer">
                                        <img src="{{ asset('storage/payment/' . $bookings->payment) }}" alt=""
                                            width="50%">
                                    </a>
                                </td>
                            </tr>

                        </table>

                        <div class="float-end">
                            <a href="{{ url('/admin/pengelola') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div><!--//table-responsive-->
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//tab-pane-->

        <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Ubah Status Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/admin/pengelola/' . $bookings->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="status" class="form-label">Status Pembayaran</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" {{ $bookings->status == 1 ? 'selected' : '' }}>Sudah Bayar
                                    </option>
                                    <option value="0" {{ $bookings->status == 0 ? 'selected' : '' }}>Belum Bayar
                                    </option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
