<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contributor BetaTudia?</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Template/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('Template/fontawesome/css/all.min.css') }}">
    <!-- Logo website-->
    <link rel="website icon" type="png" href="{{ asset('asset/logo.png') }}">
    <!-- Sweet Alert-->
    <link rel="stylesheet" href="{{ asset('Template/plugins/sweetalert2/sweetalert2.min.css') }}">

    @stack('styles')

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Navbar -->
        @include('contributor.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            @include('contributor.partials.sidebar')
            <!-- /.sidebar -->

        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">@yield('subtitle')</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        @yield('content')
                    </div>

                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('Template/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('Template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('Template/dist/js/adminlte.min.js') }}"></script>
    <!-- Sweet Alert2 -->
    <script src="{{ asset('Template/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).on('click', '#btn-delete', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var dataId = $(this).data('id');
                    $('#form-delete-' + dataId).submit();
                    Swal.fire(
                        'Terhapus!',
                        'Data telah dihapus.',
                        'success'
                    )
                }
            })
        });

        $(document).ready(function() {
            $('#btn-simpan').click(function(e) {
                e.preventDefault(); // menghentikan form submit

                // menampilkan SweetAlert2
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data akan disimpan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, simpan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // jika tombol "Yes, simpan!" ditekan, submit form
                        $('form').submit();

                        Swal.fire(
                            'Tersimpan!',
                            'Datamu berhasil.',
                            'success'
                        )

                    }
                })
            });
        });

        $(document).on('click', '#btn-batal', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang belum disimpan akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, batal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = $(this).attr('href');
                }
            })
        });



        $(document).on('click', '#btn-hapus', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var imgId = $(this).data('id');
                    $('#form-hapus-' + imgId).submit();
                    Swal.fire(
                        'Terhapus!',
                        'Data telah dihapus.',
                        'success'
                    )
                }
            })
        })
    </script>
    @stack('scripts')

</body>

</html>
