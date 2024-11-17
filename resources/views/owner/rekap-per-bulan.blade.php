@extends('owner.layout.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
    <h1 class="app-page-title">Rekap Per Bulan</h1>

    <form id="filter-form" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="month" id="month" class="form-select">
                    @foreach (range(1, 12) as $month)
                        <option value="{{ $month }}" {{ $month == date('n') ? 'selected' : '' }}>
                            {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <select name="year" id="year" class="form-select">
                    @for ($i = 2000; $i <= 2050; $i++)
                        <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>{{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Tampilkan</button>
            </div>
        </div>
    </form>
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade active show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table mb-5">

                <div class="app-card-body">

                    <div class="table-responsive">

                        <table class="table mb-0 text-left" id="data-table">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Nama</th>
                                    <th class="cell">Tanggal</th>
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
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            function loadDataTable(month, year) {
                $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '/owner',
                        data: {
                            month: month,
                            year: year
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'date',
                            name: 'date',
                        },
                        {
                            data: 'time_id',
                            name: 'time_id'
                        },
                        {
                            data: 'futsal_court_id',
                            name: 'futsal_court_id',
                        }
                    ]
                });
            }

            // Load data table with current month and year
            loadDataTable(new Date().getMonth() + 1, new Date().getFullYear());

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                var month = $('#month').val();
                var year = $('#year').val();

                // Destroy the existing DataTable and load a new one with the selected month and year
                $('#data-table').DataTable().destroy();
                loadDataTable(month, year);
            });
        });
    </script>
@endpush
