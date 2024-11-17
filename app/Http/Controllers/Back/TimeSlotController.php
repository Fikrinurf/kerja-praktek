<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeSlotReq;
use App\Models\Time;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $time = Time::orderBy('id', 'asc')->get();

            return DataTables::of($time)
                ->addIndexColumn()
                ->addColumn('button', function ($time) {
                    return '
                    <div class="text-center">
                            <a href="/admin/time-slot/' . $time->id . '/edit" class="btn btn-primary">Edit</a>
                            <a href="#" onclick="deleteTime(this)" data-id="' . $time->id . '" class="btn btn-danger">Delete</a>
                    </div>';
                })
                ->rawColumns(['button'])
                ->make();
        }

        return view('admin.time-slot.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.time-slot.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimeSlotReq $request)
    {
        $data = $request->validated();
        Time::create($data);

        return redirect(url('/admin/time-slot'))->with('success', 'Berhasil Menambahkan Data');
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
        return view('admin.time-slot.edit', ['time' => Time::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TimeSlotReq $request, string $id)
    {
        $data = $request->validated();

        Time::find($id)->update($data);
        return redirect(url('/admin/time-slot'))->with('success', 'Berhasil Mengupdate Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Time::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Berhasil menghapus waktu'
        ]);
    }
}
