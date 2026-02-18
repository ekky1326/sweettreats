<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\RawDocService;

class DocServiceController extends Controller
{
    public function index()
    {
        $perPage = $this->perPage;

        $services = RawDocService::withCount('reservationServices')
            ->orderBy('name')
            ->paginate($perPage);

        return view('crud.docservice.list', compact('services'));
    }

    public function create()
    {
        return view('crud.docservice.new');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|max:255',
            'duration_minutes' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        RawDocService::create([
            'name' => request('name'),
            'duration_minutes' => request('duration_minutes'),
            'price' => request('price'),
            'created_at' => now(),
            'created_by' => session('user_id'),
        ]);

        return redirect()->route('rawdocservice')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = RawDocService::findOrFail($id);

        return view('crud.docservice.edit', compact('service'));
    }

    public function update($id)
    {
        request()->validate([
            'name' => 'required|max:255',
            'duration_minutes' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $service = RawDocService::findOrFail($id);
        $service->update([
            'name' => request('name'),
            'duration_minutes' => request('duration_minutes'),
            'price' => request('price'),
            'updated_at' => now(),
            'updated_by' => session('user_id'),
        ]);

        return redirect()->route('rawdocservice')->with('success', 'Layanan berhasil diubah');
    }

    public function destroy($id)
    {
        $service = RawDocService::findOrFail($id);

        if ($service->reservationServices()->count() > 0) {
            return redirect()->route('rawdocservice')->with('error', 'Data tidak dapat dihapus karena masih digunakan di reservasi');
        }

        $service->delete();
        return redirect()->route('rawdocservice')->with('success', 'Layanan berhasil dihapus');
    }
}
