@extends('template.app_admin_masjid')

@section('judul')
    <div class="container-fluid text-white">
        <div class="row p-t-b-10 ">
            <div class="col">
                <h4>
                    Inventaris Masjid
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
                                    <h6 class="card-title">Tabel Data Inventaris Masjid</h6>
                                </div>
                                <div class="col-2 text-right">
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#tambah">
                                        <i class="icon icon-add"> Tambah</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatableInventaris" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
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

    <!-- Modal -->
    <div class="modal fade" id="tambah"
         role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content no-r ">
                <a href="#" data-dismiss="modal" aria-label="Close"
                   class="paper-nav-toggle active"><i></i></a>
                <div class="modal-body no-p">
                    <div class="text-center p-t-20 p-b-0">
                        <h4>Tambah Inventaris Masjid</h4>
                    </div>
                    <div class="light p-10 b-t-b">
                        <form action="/admin_masjid/inventaris/create" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input name="nama" type="text" class="form-control form-control-lg"
                                       placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input name="jumlah" type="number" class="form-control form-control-lg"
                                       placeholder="Jumlah" required>
                            </div>
                            <div class="form-group">
                                <label for="textArea" class="col-xl-2 form-control-label">Keterangan</label>
                                <textarea class="form-control" rows="3" id="keterangan" name="keterangan">-</textarea>
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
                            <h4>Tambah Inventaris Masjid</h4>
                        </div>
                        <div class="light p-10 b-t-b">
                            <form action="/admin_masjid/inventaris/update/{{$d->id}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input name="nama" type="text" class="form-control form-control-lg"
                                           placeholder="Nama" value="{{$d->nama}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah</label>
                                    <input name="jumlah" type="number" class="form-control form-control-lg"
                                           placeholder="Jumlah" value="{{$d->jumlah}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-xl-2 form-control-label">Keterangan</label>
                                    <textarea class="form-control" rows="3" id="keterangan" name="keterangan">{{$d->keterangan}}</textarea>
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
    @endforeach

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
                '                        <a href="/admin_masjid/inventaris/delete/'+id+'" class="btn btn-primary btn-fab-md">Ya</a>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '        </div>'
            );
        }

        $('#hapus').on('hidden.bs.modal', function () {
            $('#hapus-id').remove();
        });

        $(function() {
            $('#datatableInventaris').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                info: true,
                ajax: '/admin_masjid/inventaris/datatable',
                columns: [{
                    "data": null,
                    'sortable': false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
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
