@extends('admin.layout.app')
@section('content')
    <h1 class="app-page-title">Tambah Lapangan</h1>
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
            <form class="settings-form" action="{{ url('/admin/lapangan') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Lapangan</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <button type="submit" class="btn app-btn-primary mb-3">Tambah</button>
            </form>
        </div>


    </div>

    </div>
@endsection
