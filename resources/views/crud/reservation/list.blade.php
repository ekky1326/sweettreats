@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-right">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a>CRUD</a></li>
                        <li class="breadcrumb-item active">Reservation</li>
                    </ol>
                </div>
                <h4 class="page-title">Reservation</h4>
            </div>
        </div>
    </div>

    @include('layouts.notif')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('rawreservation.new') }}" class="btn btn-sm btn-primary float-left mb-3">
                            <i class="fa fa-plus"></i> Tambah
                        </a>

                        <table class="table table-bordered table-hover" width="100%" cellspacing="0" style="font-size:0.85rem">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Customer</th>
                                    <th>Dokter</th>
                                    <th>Cabang</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Perawatan</th>
                                    <th>Promo</th>
                                    <th>Status</th>
                                    <th>FU H-1</th>
                                    <th>FU H</th>
                                    <th>FU -1 Jam</th>
                                    <th>Kehadiran</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $key => $row)
                                    @php $si = $row->status_info; @endphp
                                    <tr>
                                        <td>{{ $reservations->firstItem() + $key }}</td>
                                        <td>{{ $row->customer->name ?? '-' }}</td>
                                        <td>{{ $row->doctor->name ?? '-' }}</td>
                                        <td>{{ $row->branch->name ?? '-' }}</td>
                                        <td>{{ $row->date ? $row->date->format('d/m/Y') : '-' }}</td>
                                        <td nowrap>{{ $row->start_hour }} - {{ $row->end_hour }}</td>

                                        {{-- Perawatan badge --}}
                                        <td>
                                            @forelse ($row->services as $svc)
                                                <span class="badge badge-light border" style="font-size:0.75rem;margin:1px">
                                                    {{ $svc->docService->name ?? '-' }}
                                                </span>
                                            @empty
                                                <span class="text-muted">-</span>
                                            @endforelse
                                        </td>
                                        {{-- Promo --}}
                                        <td>
                                            @if($row->promo)
                                                <span class="badge badge-info" style="font-size:0.75rem">
                                                    {{ $row->promo->promo_code }}
                                                </span>
                                            @else
                                                <span class="text-muted" style="font-size:0.8rem">-</span>
                                            @endif
                                        </td>

                                        {{-- Status inline --}}
                                        <td>
                                            <select class="form-control form-control-sm inline-update" style="min-width:130px"
                                                data-id="{{ $row->id }}" data-field="status">
                                                @foreach (\App\Models\RawCusReservation::statusOptions() as $k => $opt)
                                                    <option value="{{ $k }}" {{ $row->status == $k ? 'selected' : '' }}>
                                                        {{ $opt['label'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        {{-- FU H-1 --}}
                                        <td>
                                            <select class="form-control form-control-sm inline-update" style="min-width:110px"
                                                data-id="{{ $row->id }}" data-field="follow_up_h_min_1">
                                                <option value="">-- --</option>
                                                <option value="confirm"     {{ $row->follow_up_h_min_1 == 'confirm'     ? 'selected' : '' }}>✅ Confirm</option>
                                                <option value="reschedule"  {{ $row->follow_up_h_min_1 == 'reschedule'  ? 'selected' : '' }}>🔄 Reschedule</option>
                                                <option value="cancel"      {{ $row->follow_up_h_min_1 == 'cancel'      ? 'selected' : '' }}>❌ Cancel</option>
                                                <option value="no_respon"   {{ $row->follow_up_h_min_1 == 'no_respon'   ? 'selected' : '' }}>📵 No Respon</option>
                                            </select>
                                        </td>

                                        {{-- FU H --}}
                                        <td>
                                            <select class="form-control form-control-sm inline-update" style="min-width:110px"
                                                data-id="{{ $row->id }}" data-field="follow_up_h">
                                                <option value="">-- --</option>
                                                <option value="confirm"     {{ $row->follow_up_h == 'confirm'     ? 'selected' : '' }}>✅ Confirm</option>
                                                <option value="reschedule"  {{ $row->follow_up_h == 'reschedule'  ? 'selected' : '' }}>🔄 Reschedule</option>
                                                <option value="cancel"      {{ $row->follow_up_h == 'cancel'      ? 'selected' : '' }}>❌ Cancel</option>
                                                <option value="no_respon"   {{ $row->follow_up_h == 'no_respon'   ? 'selected' : '' }}>📵 No Respon</option>
                                            </select>
                                        </td>

                                        {{-- FU -1 Jam --}}
                                        <td>
                                            <select class="form-control form-control-sm inline-update" style="min-width:110px"
                                                data-id="{{ $row->id }}" data-field="follow_up_h_min_1_jam">
                                                <option value="">-- --</option>
                                                <option value="confirm"     {{ $row->follow_up_h_min_1_jam == 'confirm'     ? 'selected' : '' }}>✅ Confirm</option>
                                                <option value="reschedule"  {{ $row->follow_up_h_min_1_jam == 'reschedule'  ? 'selected' : '' }}>🔄 Reschedule</option>
                                                <option value="cancel"      {{ $row->follow_up_h_min_1_jam == 'cancel'      ? 'selected' : '' }}>❌ Cancel</option>
                                                <option value="no_respon"   {{ $row->follow_up_h_min_1_jam == 'no_respon'   ? 'selected' : '' }}>📵 No Respon</option>
                                            </select>
                                        </td>

                                        {{-- Kehadiran --}}
                                        <td>
                                            <select class="form-control form-control-sm inline-update" style="min-width:110px"
                                                data-id="{{ $row->id }}" data-field="keterangan_kehadiran">
                                                <option value="">-- --</option>
                                                <option value="hadir"       {{ $row->keterangan_kehadiran == 'hadir'       ? 'selected' : '' }}>✅ Hadir</option>
                                                <option value="tidak_hadir" {{ $row->keterangan_kehadiran == 'tidak_hadir' ? 'selected' : '' }}>❌ Tidak Hadir</option>
                                                <option value="reschedule"  {{ $row->keterangan_kehadiran == 'reschedule'  ? 'selected' : '' }}>🔄 Reschedule</option>
                                                <option value="cancel"      {{ $row->keterangan_kehadiran == 'cancel'      ? 'selected' : '' }}>❌ Cancel</option>
                                            </select>
                                        </td>

                                        <td nowrap>
                                            <a href="{{ route('rawreservation.edit', $row->id) }}"
                                                class="btn btn-info" style="padding:2px 6px" title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $reservations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).on('change', '.inline-update', function () {
    const id    = $(this).data('id');
    const field = $(this).data('field');
    const value = $(this).val();
    const $sel  = $(this);

    $sel.prop('disabled', true);

    $.ajax({
        url:    '/rawreservation/' + id + '/inline',
        method: 'PATCH',
        data: {
            _token: '{{ csrf_token() }}',
            field:  field,
            value:  value,
        },
        success: function () {
            // Flash hijau sebentar
            $sel.css('border-color', '#28a745');
            setTimeout(() => $sel.css('border-color', ''), 1500);
        },
        error: function () {
            alert('Gagal menyimpan, coba lagi.');
        },
        complete: function () {
            $sel.prop('disabled', false);
        }
    });
});
</script>
@endsection