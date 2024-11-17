<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\LapanganReq;
use App\Models\FutsalCourt;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $lapangan = FutsalCourt::orderBy('id', 'asc')->get();

            return DataTables::of($lapangan)
                ->addIndexColumn()
                ->addColumn('button', function ($lapangan) {
                    return '
                    <div class="text-center">
                            <a href="/admin/lapangan/' . $lapangan->id . '/edit" class="btn btn-primary">Edit</a>
                            <a href="#" onclick="deleteLapangan(this)" data-id="' . $lapangan->id . '" class="btn btn-danger">Delete</a>
                    </div>';
                })
                ->rawColumns(['button'])
                ->make();
        }
        return view('admin.lapangan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.lapangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LapanganReq $request)
    {
        $data = $request->validated();
        FutsalCourt::create($data);

        return redirect(url('/admin/lapangan'))->with('success', 'Berhasil Menambahkan Data');
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
        return view('admin.lapangan.edit', ['lapangan' => FutsalCourt::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LapanganReq $request, string $id)
    {
        $data = $request->validated();

        FutsalCourt::find($id)->update($data);
        return redirect(url('/admin/lapangan'))->with('success', 'Berhasil Mengupdate Data Lapangan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = FutsalCourt::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Berhasil menghapus Lapangan'
        ]);
    }
}
