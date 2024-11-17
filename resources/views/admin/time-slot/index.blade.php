@extends('admin.layout.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endpush
@section('content')
    <h1 class="app-page-title">Tambah Jam</h1>
    <a href="{{ url('/admin/time-slot/create') }}" class="btn btn-success mb-2">Create</a>
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
    {{-- success alert --}}
    <div class="swal" data-swal="{{ session('success') }}"></div>
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade active show" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table mb-5">

                <div class="app-card-body">

                    <div class="table-responsive">

                        <table class="table mb-0 text-left" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="cell">No</th>
                                    <th class="cell">Slot Waktu</th>
                                    <th class="cell"></th>
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
                        data: 'time_slot',
                        name: 'time_slot'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ]
            });
        })

        function deleteTime(e) {
            let id = e.getAttribute('data-id');

            Swal.fire({
                title: 'Delete',
                text: 'Yakin Data Akan dihapus ?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'DELETE',
                        url: '/admin/time-slot/' + id,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: response.message,
                                icon: 'success',
                            }).then((result) => {
                                window.location.href = '/admin/time-slot';
                            })
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                        }
                    });
                }

            })
        }
    </script>
@endpush
