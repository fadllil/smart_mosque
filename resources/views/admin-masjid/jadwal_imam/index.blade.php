@extends('template.app_admin_masjid')

@section('judul')
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    Jadwal Imam Masjid
                </h4>
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
                                    <h6 class="card-title">Data Jadwal Imam Masjid</h6>
                                </div>
                                <div class="col-2 text-right">
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah">
                                        <i class="icon icon-add"> Tambah</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($data as $d)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row justify-content-between">
                                                    <h6 class="card-title">{{$d->hari}}</h6>
                                                    <div>
                                                        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#add{{$d->id}}">
                                                            <i class="icon icon-add"></i>
                                                        </button>
                                                        <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#edit{{$d->id}}">
                                                            <i class="icon icon-edit"></i>
                                                        </button>
                                                        <button class="btn btn-outline-danger btn-sm" data-toggle="modal" onclick="hapus({{$d->id}})" data-target="#hapus">
                                                            <i class="icon icon-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @foreach($d->detailImam as $imam)
                                                    <div class="row justify-content-between">
                                                        <p>{{$imam->jadwal}}</p>
                                                        <p>{{$imam->nama}}</p>
                                                        <div>
                                                            <button class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#editJadwal{{$d->id}}">
                                                                <i class="icon icon-edit"></i>
                                                            </button>
                                                            <button class="btn btn-outline-danger btn-sm" onclick="hapusJadwal({{$imam->id}})" data-toggle="modal" data-target="#hapus">
                                                                <i class="icon icon-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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

    <!-- Modal -->
    <div class="modal fade" id="tambah"
         role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content no-r ">
                <a href="#" data-dismiss="modal" aria-label="Close"
                   class="paper-nav-toggle active"><i></i></a>
                <div class="modal-body no-p">
                    <div class="text-center p-t-20 p-b-0">
                        <h4>Tambah Hari Jadwal Imam</h4>
                    </div>
                    <div class="light p-10 b-t-b">
                        <form action="/admin_masjid/jadwal_imam/create" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <input name="hari" type="text" class="form-control form-control-lg"
                                       placeholder="Hari" required>
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

    @foreach($data as $d)
        <!-- Modal -->
        <div class="modal fade" id="edit{{$d->id}}"
             role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content no-r ">
                    <a href="#" data-dismiss="modal" aria-label="Close"
                       class="paper-nav-toggle active"><i></i></a>
                    <div class="modal-body no-p">
                        <div class="text-center p-t-20 p-b-0">
                            <h4>Edit Hari Jadwal Imam</h4>
                        </div>
                        <div class="light p-10 b-t-b">
                            <form action="/admin_masjid/jadwal_imam/update/{{$d->id}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="hari">Hari</label>
                                    <input name="hari" type="text" class="form-control form-control-lg"
                                           placeholder="Hari" value="{{$d->hari}}" required>
                                </div>
                                <div class="text-right">
                                    <input type="button" class="btn btn-danger btn-fab-md" data-dismiss="modal" value="Batal">
                                    <input type="submit" class="btn btn-primary btn-fab-md" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="add{{$d->id}}"
             role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content no-r ">
                    <a href="#" data-dismiss="modal" aria-label="Close"
                       class="paper-nav-toggle active"><i></i></a>
                    <div class="modal-body no-p">
                        <div class="text-center p-t-20 p-b-0">
                            <h4>Tambah Jadwal Imam</h4>
                        </div>
                        <div class="light p-10 b-t-b">
                            <form action="/admin_masjid/jadwal_imam/jadwal/create" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="jadwal">Jadwal Sholat</label>
                                    <input name="jadwal" type="text" class="form-control form-control-lg"
                                           placeholder="Jadwal" required>
                                    <input name="id_jadwal_imam" type="hidden" value="{{$d->id}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Imam</label>
                                    <input name="nama" type="text" class="form-control form-control-lg"
                                           placeholder="Nama Imam" required>
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

        @foreach($d->detailImam as $imam)
            <!-- Modal -->
            <div class="modal fade" id="editJadwal{{$imam->id}}"
                 role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content no-r ">
                        <a href="#" data-dismiss="modal" aria-label="Close"
                           class="paper-nav-toggle active"><i></i></a>
                        <div class="modal-body no-p">
                            <div class="text-center p-t-20 p-b-0">
                                <h4>Edit Jadwal Imam</h4>
                            </div>
                            <div class="light p-10 b-t-b">
                                <form action="/admin_masjid/jadwal_imam/jadwal/update/{{$imam->id}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="jadwal">Jadwal Sholat</label>
                                        <input name="jadwal" type="text" class="form-control form-control-lg"
                                               value="{{$imam->jadwal}}"
                                               placeholder="Jadwal" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Imam</label>
                                        <input name="nama" type="text" class="form-control form-control-lg"
                                               value="{{$imam->nama}}"
                                               placeholder="Nama Imam" required>
                                    </div>
                                    <div class="text-right">
                                        <input type="button" class="btn btn-danger btn-fab-md" data-dismiss="modal" value="Batal">
                                        <input type="submit" class="btn btn-primary btn-fab-md" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

    <!-- Hapus modal -->
    <div class="modal fade" id="hapus" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel">
    </div>

@endsection

@section('script')
    <script>
        function hapus(id){
            $('#hapus').append(
                '<div class="modal-dialog width-400" id="hapus-id" role="document">\n' +
                '            <div class="modal-content no-r "><a href="#" data-dismiss="modal" aria-label="Close"\n' +
                '                                                class="paper-nav-toggle active"><i></i></a>\n' +
                '                <div\n' +
                '                    class="modal-body no-p">\n' +
                '                    <div class="text-center p-40 p-b-0" style="margin-bottom: 10px">\n' +
                '                        <i class="icon s-48 icon-warning3 red-text"></i>\n' +
                '                        <p class="p-t-b-20">Apakah anda yakin ingin menghapus data?</p>\n' +
                '                        <a href="#" class="danger btn btn-danger btn-fab-md" data-dismiss="modal" aria-label="Close">Tidak</a>\n' +
                '                        <a href="/admin_masjid/jadwal_imam/delete/'+id+'" class="btn btn-primary btn-fab-md">Ya</a>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </div>'
            );
        }

        $('#hapus').on('hidden.bs.modal', function () {
            $('#hapus-id').remove();
        });

        function hapusJadwal(id){
            $('#hapus').append(
                '<div class="modal-dialog width-400" id="hapus-id" role="document">\n' +
                '            <div class="modal-content no-r "><a href="#" data-dismiss="modal" aria-label="Close"\n' +
                '                                                class="paper-nav-toggle active"><i></i></a>\n' +
                '                <div\n' +
                '                    class="modal-body no-p">\n' +
                '                    <div class="text-center p-40 p-b-0" style="margin-bottom: 10px">\n' +
                '                        <i class="icon s-48 icon-warning3 red-text"></i>\n' +
                '                        <p class="p-t-b-20">Apakah anda yakin ingin menghapus data?</p>\n' +
                '                        <a href="#" class="danger btn btn-danger btn-fab-md" data-dismiss="modal" aria-label="Close">Tidak</a>\n' +
                '                        <a href="/admin_masjid/jadwal_imam/jadwal/delete/'+id+'" class="btn btn-primary btn-fab-md">Ya</a>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </div>'
            );
        }

        $('#hapus').on('hidden.bs.modal', function () {
            $('#hapus-id').remove();
        });
    </script>
@endsection
