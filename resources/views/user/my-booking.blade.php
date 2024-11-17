@extends('layout-fe.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('fe/booking.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
    <section class="container text-white mt-5 mb-5">
        <br>
        <h1 class="text-center mb-4">Booking saya</h1>
        <div class="swal" data-swal="{{ session('success') }}"></div>
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade active show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
                <div class="app-card app-card-orders-table mb-5">

                    <div class="app-card-body">

                        <div class="table-responsive">

                            <table class="table table-light mb-0 text-left" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="cell">No</th>
                                        <th class="cell">Nama</th>
                                        <th class="cell">Alamat</th>
                                        <th class="cell">Tanggal</th>
                                        <th class="cell">Status</th>
                                        <th class="cell">Jam</th>
                                        <th class="cell">Lapangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($myBookings as $booking)
                                        <tr>
                                            <td class="cell">{{ $loop->iteration }}</td>
                                            <td class="cell">{{ $booking->name }}</td>
                                            <td class="cell">{{ $booking->address }}</td>
                                            <td class="cell">{{ $booking->date }}</td>
                                            <td class="cell">{{ $booking->status }}</td>
                                            <td class="cell">{{ $booking->time->time_slot }}</td>
    
                                        </tr>
                                    @endforeach --}}



                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div>
    </section>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const swal = $('.swal').data('swal');
        if (swal) {
            Swal.fire({
                'tile': 'Success',
                'text': swal,
                'icon': 'success',
                'showConfirmButton': false,
                'timer': 2000
            })
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'time_id',
                        name: 'time_id'
                    },
                    {
                        data: 'futsal_court_id',
                        name: 'futsal_court_id'
                    },
                ]
            });
        })
    </script>
@endpush
