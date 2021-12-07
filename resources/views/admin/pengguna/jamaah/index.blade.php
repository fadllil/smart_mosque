@extends('template.app')

@section('judul')
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    Manajemen Pengguna
                </h4>
                <h6>
                    Warga
                </h6>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Main content -->
    <div class="content-wrapper animatedParent animateOnce">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h6 class="card-title">Tabel Data Admin Masjid</h6>
                                </div>
{{--                                <div class="col-2 text-right">--}}
{{--                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah">--}}
{{--                                        <i class="icon icon-add"> Tambah</i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatableAdminMasjid" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th style="width: 160px">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(function() {
            $('#datatableAdminMasjid').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                info: true,
                ajax: '/admin/jamaah/datatable',
                columns: [{
                    "data": null,
                    'sortable': false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                    {
                        data: 'user.nama',
                        name: 'nama'
                    },
                    {
                        data: 'user.email',
                        name: 'email'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
        });
    </script>
@endsection
