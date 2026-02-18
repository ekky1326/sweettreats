<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use App\Models\RawBranch;
use App\Models\RawCustomer;
use App\Models\RawCusReservation;
use App\Models\RawCusResService;
use App\Models\RawDoctor;
use App\Models\RawDocService;
use App\Models\Users;

class ReservasiCabangController extends Controller
{
    public function index()
{
    $perPage = $this->perPage;

    // Ambil user yang sedang login
 $userId = session('id'); // new
 $user = Users::find($userId);

    $query = RawCusReservation::with('branch', 'customer', 'doctor')
        ->withCount('services')
        ->orderBy('date', 'desc');

    // Jika user punya cabang, filter by cabang tersebut
    if (!empty($user->raw_branch_id)) {
        $query->where('raw_branch_id', $user->raw_branch_id);
    }

    $reservations = $query->paginate($perPage);

    return view('crud.reservasicabang.list', compact('reservations'));
}

    public function create()
    {
        $branches = RawBranch::orderBy('name')->get();
        $customers = RawCustomer::orderBy('name')->get();
        $doctors = RawDoctor::orderBy('name')->get();

        return view('crud.reservation.new', compact('branches', 'customers', 'doctors'));
    }

    public function store()
    {
        request()->validate([
            'raw_branch_id' => 'required',
            'raw_customer_id' => 'required',
            'raw_doctor_id' => 'required',
            'date' => 'required|date',
            'start_hour' => 'required',
            'end_hour' => 'required',
        ]);

        RawCusReservation::create([
            'raw_branch_id' => request('raw_branch_id'),
            'raw_customer_id' => request('raw_customer_id'),
            'raw_doctor_id' => request('raw_doctor_id'),
            'date' => request('date'),
            'start_hour' => request('start_hour'),
            'end_hour' => request('end_hour'),
            'is_waiting' => request('is_waiting', 0),
            'created_at' => now(),
        ]);

        return redirect()->route('rawreservation')->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $reservation = RawCusReservation::with('branch', 'customer', 'doctor')->findOrFail($id);
        $branches = RawBranch::orderBy('name')->get();
        $customers = RawCustomer::orderBy('name')->get();
        $doctors = RawDoctor::orderBy('name')->get();
        $docServices = RawDocService::orderBy('name')->get();

        $services = RawCusResService::with('doctor', 'docService')
            ->where('raw_cus_reservation_id', $id)
            ->get();

        return view('crud.reservation.edit', compact(
            'reservation',
            'branches',
            'customers',
            'doctors',
            'docServices',
            'services'
        ));
    }

    public function update($id)
    {
        request()->validate([
            'raw_branch_id' => 'required',
            'raw_customer_id' => 'required',
            'raw_doctor_id' => 'required',
            'date' => 'required|date',
            'start_hour' => 'required',
            'end_hour' => 'required',
        ]);

        $reservation = RawCusReservation::findOrFail($id);
        $reservation->update([
            'raw_branch_id' => request('raw_branch_id'),
            'raw_customer_id' => request('raw_customer_id'),
            'raw_doctor_id' => request('raw_doctor_id'),
            'date' => request('date'),
            'start_hour' => request('start_hour'),
            'end_hour' => request('end_hour'),
            'status' => request('status', 'pending'),
            'is_waiting' => request('is_waiting', 0),
            'updated_at' => now(),
            'updated_by' => session('user_id'),
        ]);

        return redirect()->route('rawreservation.edit', $id)->with('success', 'Reservasi berhasil diubah');
    }

    public function destroy($id)
    {
        $reservation = RawCusReservation::findOrFail($id);

        if ($reservation->services()->count() > 0) {
            return redirect()->route('rawreservation')->with('error', 'Data tidak dapat dihapus karena masih memiliki layanan');
        }

        $reservation->delete();
        return redirect()->route('rawreservation')->with('success', 'Reservasi berhasil dihapus');
    }

    // === Reservation Service (Child CRUD) ===

    public function serviceStore($reservationId)
    {
        request()->validate([
            'raw_doctor_id' => 'required',
            'raw_doc_service_id' => 'required',
        ]);

        RawCusResService::create([
            'raw_cus_reservation_id' => $reservationId,
            'raw_doctor_id' => request('raw_doctor_id'),
            'raw_doc_service_id' => request('raw_doc_service_id'),
        ]);

        return redirect()->route('rawreservation.edit', $reservationId)->with('success', 'Layanan berhasil ditambahkan');
    }

    public function serviceDestroy($reservationId, $serviceId)
    {
        $service = RawCusResService::where('raw_cus_reservation_id', $reservationId)
            ->findOrFail($serviceId);

        $service->delete();

        return redirect()->route('rawreservation.edit', $reservationId)->with('success', 'Layanan berhasil dihapus');
    }
}
