<?php

use PhpParser\Node\Expr\Print_;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class="hold-transition sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
              
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltam">
                            Tambah
                        </button>

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalbag">
                            Bagian
                        </button>

                        <!-- Jenis Kebutuhan tombol -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaljen">
                            Jenis Kebutuhan
                        </button>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>No.wa</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data1 as $dt1)
                                <tr>
                                    <td>{{ $dt1->nama }}</td>
                                    <td>{{ $dt1->no_wa }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDet<?= $dt1->id_profile; ?>">
                                            Info
                                        </button>
                                        <a href="/index/destroy/{{$dt1->id_profile}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

                @foreach ($data1 as $dt1)
                <!-- Modal DETAIL -->
                <div class="modal fade" id="modalDet<?= $dt1->id_profile; ?>">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title">Info</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Profile Image -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">

                                                <h3 class="profile-username text-center">{{ $dt1->nama }}</h3>

                                                <p class="text-muted text-center">{{ $dt1->no_wa }}</p>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Deks. Kebutuhan</b> <a class="float-right">{{ $dt1->deskripsi_keb }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Jenis Keb.</b> <a class="float-right">{{ $dt1->jenis_keb}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Bagian.</b> <a class="float-right">{{ $dt1->bagian }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Urgen</b> <a class="float-right">{{ $dt1->urgen}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Kategori</b> <a class="float-right">{{ $dt1->kategori}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Progres</b> <a class="float-right">{{ $dt1->progres}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>PIC</b> <a class="float-right">{{ $dt1->pic}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>

                                    <div class="col">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid" src="img/logo.jpg" alt="User profile picture">
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--  -->
                @endforeach

                <!-- Modal Bagian -->
                <div class="modal fade" id="modaltam">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title">Tambah Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('profile.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Nama.." name="nama">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Kontak. Wa.." name="no_wa">
                                        </div>
                                        <div class="col">
                                            <input type="hidden" class="form-control" value="">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <select class="form-control" name="urgen">
                                                <option selected>Pilih Urgensi</option>
                                                @foreach ($data['urgensi'] as $dt)
                                                <option value="<?= $dt; ?>"><?= $dt; ?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="kategori">
                                                <option selected>Pilih Kategori</option>
                                                @foreach ($data['kategori'] as $dt)
                                                <option value="<?= $dt; ?>"><?= $dt; ?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="PIC" name="pic">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col">
                                            <select class="form-control" name="progres">
                                                <option selected hidden disabled>Pilih Progress</option>
                                                @foreach ($data['progres'] as $dt)
                                                <option value="<?= $dt; ?>"><?= $dt; ?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="id_bagian">
                                                <option selected>Pilih Bagian</option>
                                                @foreach ($bagian as $bgn)
                                                <option value="<?= $bgn['id_bagian']; ?>"><?= $bgn['bagian']; ?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="id_jenisKeb">
                                                <option selected hidden>Pilih Jenis Kebutuhan</option>
                                                @foreach ($jenis as $jns)
                                                <option value="<?= $jns['id_jenisKeb']; ?>"><?= $jns['jenis_keb']; ?></option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <textarea class="form-control" rows="3" placeholder="Tentang Kebutuhan..." name="deskripsi_keb"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--  -->

                <!-- Modal Bagian -->
                <div class="modal fade" id="modalbag">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title">Bagian</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('bagian.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="text" class="form-control" placeholder="Bagian.." name="bagian">
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Bagian</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bagian as $bgn)
                                        <?php $i = 1 ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>{{ $bgn->bagian }}</td>
                                            <td><button class="btn btn-danger">Hapus</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--  -->

                <!-- Modal Bagian -->
                <div class="modal fade" id="modaljen">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h4 class="modal-title">Jenis Kebutuhan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('jenis.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="text" name="jenis_keb" class="form-control" placeholder="Jenis Kebutuhan...">
                                        </div>
                                        <div class="col-4">
                                            <button class="btn btn-success">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-bordered mt-5">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Task</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jenis as $jns)
                                        <?php $i = 1 ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td>{{ $jns->jenis_keb }}</td>
                                            <td><button class="btn btn-danger">Hapus</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!--  -->
            </section>
            <!-- /.content -->


        </div>
        <!-- /.content-wrapper -->



        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0-rc
            </div>
            
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
</body>

</html>