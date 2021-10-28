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
                            <th>Nama</th>
                            <th>Gejala</th>
                            <th>Indikasi Penyakit</th>
                            <th>Waktu Pemeriksaan</th>
                            <th>Data Pengguna</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1 ?>
                        @foreach ($data['dataPemeriksaan'] as $history)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $history['nama'] }}</td>
                            <td>{{ $history['gejala'] }}</td>
                            <td>{{ $history['indikasi_penyakit'] }}</td>
                            <td>{{ $history['created_at'] }}</td>
                            <td class="d-flex justify-content-center">
                              <button type="button" class="btn btn-sm btn-primary modal-showDataPengguna" data-toggle="modal" data-target="#modal-dataPengguna" data-id="{{ $history['id'] }}">
                                Lihat
                              </button>
                              <div class="modal fade" id="modal-dataPengguna">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Data Pengguna</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="modal-body">
                                        <form action="" method="">
                                            @csrf
                                            <div class="form-group">
                                                <label for="showNama">Nama</label>
                                                <input type="text" class="form-control" id="showName" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="showEmail">Email</label>
                                                <input type="text" class="form-control" id="showEmail" name="email" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="showBirthPlace">Tempat, Tanggal Lahir</label>
                                                <input type="text" class="form-control" id="showBirthPlace" name="birth_place">
                                                <input type="date" class="form-control" id="showBirthDate" name="birth_date">
                                            </div>
                                            <div class="form-group">
                                                <label for="showGender">Jenis Kelamin</label>
                                                <select class="form-control" name="gender" id="showGender">
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="showGender">Alamat</label>
                                                <input type="text" class="form-control" id="showAddress" name="address">
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>                                    
                                  </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                            </td>
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