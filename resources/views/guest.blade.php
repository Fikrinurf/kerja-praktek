@extends('layout-fe.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('fe/Dhome.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
    <section class="container-hero">
        <div class="row gap-5 ms-5">
            <div class="col">

                <div class="text-hero">
                    <h1>PAKUWON</h1>
                    <h1>MINI SOCCER</h1>
                    <p>Pakuwon Minni Soccer menyediakan lapangan yang berkualitas tinggi dan berstandar nasional.
                        Tersedia juga beragam fasilitas pendukung yang membuat permainan Mini Soccer-mu menjadi lebih
                        menyenangkan.</p>
                </div>

            </div>

            <div class="col ms-5 mt-5">
                <img src="{{ asset('img/goat.png') }}" alt="">
            </div>

        </div>
    </section>


    <section class="container-fasilitas">
        <div class="row d-flex justify-content-center gap-4 ">
            <div class="col-6 col-sm-3 text-center mt-2 text-fasilitas">
                <h2 class="fasilitas-judul">FASILITAS</h2>
                <p class="fasilitas-artikel">Banyak Fasilitas yang bisa kamu dapatkan di Pakuwon Mini Soccer</p>
            </div>

            <div class="col-6 col-sm-3  card-fasilitas">
                <div class="icon-fasilitas">
                    <img src="{{ asset('img/icon/masjid.png') }}" alt="">
                </div>
                <div>
                    <h2 class="judul-fasilitas">Mushola</h2>
                </div>

            </div>

            <div class="col-6 col-sm-3  card-fasilitas">
                <div class="icon-fasilitas">
                    <img src="{{ asset('img/icon/shower.png') }}" alt="">
                </div>
                <div>
                    <h2 class="judul-fasilitas">Kamar Mandi</h2>
                </div>

            </div>

            <!-- Force next columns to break to new line -->
            <div class="w-100"></div>


            <div class="col-6 col-sm-3  card-fasilitas">
                <div class="icon-fasilitas">
                    <img src="{{ asset('img/icon/kantin.png') }}" alt="">
                </div>
                <div>
                    <h2 class="judul-fasilitas">Kantin</h2>
                </div>

            </div>


            <div class="col-6 col-sm-3  card-fasilitas">
                <div class="icon-fasilitas">
                    <img src="img/icon/lapang.png" alt="">
                </div>
                <div>
                    <h2 class="judul-fasilitas">Berstandar Nasional</h2>
                </div>

            </div>


            <div class="col-6 col-sm-3  card-fasilitas">
                <div class="icon-fasilitas">
                    <img src="img/icon/toilet.png" alt="">
                </div>
                <div>
                    <h2 class="judul-fasilitas">Toilet</h2>
                </div>

            </div>



        </div>
    </section>

    <section class="container text-white mt-5 mb-5">
        <h1 class="text-center mb-4">Jadwal Booking</h1>

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
                            <option value="{{ $i }}" {{ $i == date('Y') ? 'selected' : '' }}>
                                {{ $i }}
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

                            <table class="table mb-0 text-left table-light" id="data-table">
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

                                </tbody>
                            </table>
                        </div><!--//table-responsive-->
                    </div><!--//app-card-body-->
                </div><!--//app-card-->
            </div><!--//tab-pane-->
        </div>
    </section>
    <section class="card-service d-flex justify-content-center mt-5 gap-5">

        <div class="card" style="width: 14rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>

        <div class="card" style="width: 14rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>

        <div class="card" style="width: 14rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>


        <div class="card" style="width: 14rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
            </div>
        </div>

    </section>
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
                        url: '/',
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
