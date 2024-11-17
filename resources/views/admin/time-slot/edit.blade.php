@extends('admin.layout.app')
@section('content')
    <h1 class="app-page-title">Edit Slot Waktu</h1>
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
            <form class="settings-form" action="{{ url('/admin/time-slot/' . $time->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="time_slot" class="form-label">Time Slot</label>
                    <input type="text" class="form-control" id="time_slot" name="time_slot"
                        value="{{ old('time_slot', $time->time_slot) }}">
                </div>
                <button type="submit" class="btn app-btn-primary mb-3">Update</button>
            </form>
        </div>


    </div>

    </div>
@endsection
