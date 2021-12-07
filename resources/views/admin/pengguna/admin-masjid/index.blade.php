@extends('template.app')

@section('judul')
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    Manajemen Pengguna
                </h4>
                <h6>
                    Admin Masjid
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
                                <div class="col-2 text-right">
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah">
                                        <i class="icon icon-add"> Tambah</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatableAdminMasjid" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Masjid</th>
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

    <!-- Modal -->
    <div class="modal fade" id="tambah"
         role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content no-r ">
                <a href="#" data-dismiss="modal" aria-label="Close"
                   class="paper-nav-toggle active"><i></i></a>
                <div class="modal-body no-p">
                    <div class="text-center p-t-20 p-b-0">
                        <h4>Tambah Admin Masjid</h4>
                    </div>
                    <div class="light p-10 b-t-b">
                        <form action="/admin/admin_masjid/create" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input name="nama" type="text" class="form-control form-control-lg"
                                       placeholder="Nama" required>
                                <input name="role" type="hidden" value="Masjid" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control form-control-lg"
                                       placeholder="Email@mail.com" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control form-control-lg"
                                       placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label for="masjid">Masjid</label>
                                <select class="form-control" id="masjid" name="id_masjid" required>
                                    <option value="" selected disabled>-- Pilih Masjid --</option>
                                    @foreach($masjid as $m)
                                        <option value="{{$m->id}}">{{$m->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-right">
                                <input type="button" class="btn btn-danger btn-fab-md" data-dismiss="modal" value="Batal">
                                <input type="submit" class="btn btn-primary btn-fab-md" value="Tambah">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(function() {
            $('#datatableAdminMasjid').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                info: true,
                ajax: '/admin/admin_masjid/datatable',
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
                        data: 'masjid.nama',
                        name: 'masjid'
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
