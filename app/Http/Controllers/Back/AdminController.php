<?php

namespace App\Http\Controllers\Back;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $bookings = Booking::with(['time', 'futsal_court'])->latest()->get();

            return DataTables::of($bookings)
                ->addIndexColumn()
                ->addColumn('status', function ($bookings) {
                    if ($bookings->status == 0) {
                        return '<span class="badge bg-danger">Belum Bayar</span>';
                    } else {
                        return '<span class="badge bg-success">Sudah Bayar</span>';
                    }
                })
                ->addColumn('time_id', function ($bookings) {
                    return $bookings->time->time_slot;
                })
                ->addColumn('button', function ($bookings) {
                    return '
                    <div class="text-center">
                            <a href="/admin/pengelola/' . $bookings->id . '" class="btn btn-secondary">Detail</a>
                            <a href="#" onclick="deleteBooking(this)" data-id="' . $bookings->id . '" class="btn btn-danger">Delete</a>
                    </div>';
                })
                ->rawColumns(['status', 'time_id', 'button'])
                ->make();
        }
        return view('admin.index');
    }

    public function show(string $id)
    {
        return view('admin.detail', [
            'bookings' => Booking::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {

        // Validasi untuk memastikan nilai status sesuai dengan ENUM di database
        $request->validate([
            'status' => 'required|in:0,1', // Pastikan hanya menerima 0 atau 1
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status; // Menyimpan nilai ENUM
        $booking->save();

        return redirect(url('/admin/pengelola'))->with('success', 'Berhasil Edit Status');
    }

    public function destroy(string $id)
    {
        $data = Booking::find($id);
        Storage::delete('public/payment/' . $data->payment);
        $data->delete();
        return response()->json([
            'message' => 'Booking Berhasil Dihapus'
        ]);
    }
}
