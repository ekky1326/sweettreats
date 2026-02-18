@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a>CRUD</a></li>
                            <li class="breadcrumb-item active">Doctor</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Doctor</h4>
                </div>
            </div>
        </div>

        @include('layouts.notif')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">

                            <a href="{{ route('rawdoctor.new') }}" class="btn btn-sm btn-primary float-left"
                                style="margin-bottom: 20px;"><i class="fa fa-plus"></i> Tambah</a>

                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama</th>
                                        <th width="15%">Jumlah Jadwal</th>
                                        <th width="15%">Jumlah Reservasi</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($doctors as $key => $row)
                                        <tr>
                                            <td>{{ $doctors->firstItem() + $key }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->schedules_count }}</td>
                                            <td>{{ $row->reservations_count }}</td>
                                            <td nowrap>
                                                <a href="{{ route('rawdoctor.edit', $row->id) }}" class="btn btn-info"
                                                    style="padding: 2px 6px; margin: 0 3px" data-toggle="tooltip"
                                                    data-placement="top" title="Detail"><i class="fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $doctors->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
