<?php

namespace App\Http\Controllers\Front;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserBookingReq;
use App\Models\FutsalCourt;
use App\Models\Time;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $myBookings = Booking::where('user_id', auth()->id())->with(['time', 'futsal_court'])->get();
    //     return view('user.index', compact('myBookings'));
    // }

    public function index()
    {
        if (request()->ajax()) {
            $myBookings = Booking::where('user_id', auth()->id())->with(['time', 'futsal_court'])->get();

            return DataTables::of($myBookings)
                ->addIndexColumn()
                ->addColumn('status', function ($myBookings) {
                    if ($myBookings->status == 0) {
                        return '<span class="badge bg-danger">Belum Bayar</span>';
                    } else {
                        return '<span class="badge bg-success">Sudah Bayar</span>';
                    }
                })
                ->addColumn('time_id', function ($myBookings) {
                    return $myBookings->time->time_slot;
                })
                ->addColumn('futsal_court_id', function ($myBookings) {
                    return $myBookings->futsal_court->name;
                })
                ->rawColumns(['status', 'time_id', 'futsal_court_id'])
                ->make();
        }

        return view('user.index', [
            'myBookings' => Booking::where('user_id', auth()->id())->with(['time', 'futsal_court'])->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create', [
            'times' => Time::get(),
            'futsal_courts' => FutsalCourt::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserBookingReq $request)
    {
        $data = $request->validated();

        $file = $request->file('payment');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/payment/', $fileName);

        $data['payment'] = $fileName;
        $data['user_id'] = auth()->id();

        Booking::create($data);

        return redirect(url('/user-booking'))->with('success', 'Berhasil Booking');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
