<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $data['title']; }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="/plugins/fontawesome-free/css/all.min.css"
    />
    <!-- DataTables -->
    <link
      rel="stylesheet"
      href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="/plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  </head>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"
                        ><i class="fas fa-bars"></i
                    ></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-widget="control-sidebar"
                            data-controlsidebar-slide="true"
                            href="#"
                            role="button">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
        @if ($data['role']==1)
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('admin') }}" class="brand-link">
                    <img
                    src="/img/default.png"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: 0.8"
                    />
                    <span class="brand-text font-weight-light">Stohealth</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img
                        src="/img/default.png"
                        class="img-circle elevation-2"
                        alt="User Image"
                        />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $data['name']; }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul
                        class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false"
                    >
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item ">
                            <a class="nav-link <?= ($data['title'] == "Dashboard Admin") ? 'active' : ''; ?>" href=" {{ url('admin') }}">
                                <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        
                        <!-- Mana Pengguna -->
                        <li class="nav-item">
                            <a class="nav-link <?= ($data['title'] === "Manajemen Pengguna") ? 'active' : ''; ?>" href="{{ url('admin/data-pengguna') }}">
                                <i class="nav-icon fas fa-fw fa-users"></i>
                                <p>Manajemen Pengguna</p></a>
                        </li>

                        <!-- Manajemen Penyakit -->
                        <li class="nav-item">
                            <a class="nav-link <?= ($data['title'] === "Manajemen Penyakit") ? 'active' : ''; ?>" href="{{ url('admin/data-penyakit') }}">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p>Manajemen Penyakit</p>
                            </a>
                        </li>

                        <!-- Data Pemeriksaan -->
                        <li class="nav-item">
                            <a class="nav-link <?= ($data['title'] === "Data Pemeriksaan") ? 'active' : ''; ?>" href=" {{ url('admin/data-pemeriksaan') }}">
                                <i class="nav-icon fas fa-fw fa-copy"></i>
                                <p>Data Pemeriksaan</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
            </aside>
        @endif
        @if ($data['role']==2)
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('user') }}" class="brand-link">
                    <img
                    src="/img/default.png"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: 0.8"
                    />
                    <span class="brand-text font-weight-light">Stohealth</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img
                        src="/img/default.png"
                        class="img-circle elevation-2"
                        alt="User Image"
                        />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $data['name']; }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul
                        class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false"
                    >
                        <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item ">
                            <a class="nav-link <?= ($data['title'] == "Dashboard User") ? 'active' : ''; ?>" href=" {{ url('user') }}">
                                <i class="nav-icon fas fa-fw fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        
                        <!-- Data Diri -->
                        <li class="nav-item">
                            <a class="nav-link <?= ($data['title'] === "Data Diri") ? 'active' : ''; ?>" href="{{ url('user/data-diri') }}">
                                <i class="nav-icon fas fa-fw fa-users"></i>
                                <p>Data Diri</p></a>
                        </li>

                        <!-- Pemeriksaan Kesehatan -->
                        <li class="nav-item ">
                            <a class="nav-link <?= ($data['title'] === "Pemeriksaan Kesehatan") ? 'active' : ''; ?>" href=" {{ url('user/pemeriksaan-kesehatan') }}">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p>Pemeriksaan Kesehatan</p>
                            </a>
                        </li>

                        <!-- Data Penyakit -->
                        <li class="nav-item">
                            <a class="nav-link <?= ($data['title'] === "Data Pemeriksaan") ? 'active' : ''; ?>" href=" {{ url('user/data-pemeriksaan') }}">
                                <i class="nav-icon fas fa-fw fa-copy"></i>
                                <p>Data Pemeriksaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
            </aside>
        @endif

        @yield('content')


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

            <!-- Lihat Profil Modal -->
            <div class="modal fade" id="lihatProfilModal" tabindex="-1" role="dialog" aria-labelledby="lihatProfilModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatProfilModalLabel">Data Profil Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/user/profile/edit" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="usernameLihat">Username</label>
                                <input type="text" class="form-control" id="usernameLihat" name="username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="namaLihat">Nama</label>
                                <input type="text" class="form-control" id="namaLihat" name="nama" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahirLihat">Tempat, Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahirLihat" name="tempat_lahir" readonly> 
                                <input type="date" class="form-control" id="tanggal_lahirLihat" name="tanggal_lahir" readonly>
                            </div>
                            <div class="form-group">
                                <label for="genderLihat">Jenis Kelamin</label>
                                <select class="form-control" name="gender" id="genderLihat" readonly>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="emailLihat">Email</label>
                                <input type="text" class="form-control" id="emailLihat" name="email" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamatLihat">Alamat</label>
                                <input type="text" class="form-control" id="alamatLihat" name="alamat" readonly>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    <footer class="main-footer">
        <strong
          >Copyright &copy; 2021
          <a href="{{ url('/') }}">Stohealth</a>.</strong
        >
        All rights reserved.
    </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/jszip/jszip.min.js"></script>
    <script src="/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/dist/js/demo.js"></script>
    <script src="/js/script.js"></script>
    <script src="/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1")
            .DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
            })
            .buttons()
            .container()
            .appendTo("#example1_wrapper .col-md-6:eq(0)");
            $("#example2").DataTable({
            paging: true,
            lengthChange: false,
            searching: false,
            ordering: true,
            info: true,
            autoWidth: false,
            responsive: true,
            });
        });
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
  </body>
</html>