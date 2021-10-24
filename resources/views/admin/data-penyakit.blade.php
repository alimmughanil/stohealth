@extends('layouts.main')

@section('content') 
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>{{ $data['title']; }}</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                  <li class="breadcrumb-item active">{{ $data['title']; }}</li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table
                      id="example1"
                      class="table table-bordered table-striped"
                    >
                      <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyakit</th>
                            <th>Gejala 1</th>
                            <th>Gejala 2</th>
                            <th>Gejala 3</th>
                            <th>Gejala 4</th>
                            <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1 ?>
                        @foreach ($data['dataPenyakit'] as $d_py)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $d_py['nama_penyakit'] }}</td>
                            <td>{{ $d_py['gejala1'] }}</td>
                            <td>{{ $d_py['gejala2'] }}</td>
                            <td>{{ $d_py['gejala3'] }}</td>
                            <td>{{ $d_py['gejala4'] }}</td>
                            <td>                                
                                <button class="btn btn-primary">
                                    Lihat
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-primary">
                                    Edit
                                </button>
                                <button class="btn btn-danger">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                      @endforeach
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
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    
@endsection