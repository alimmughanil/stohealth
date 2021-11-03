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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-penyakit">
              Tambah Data
            </button>
            <div class="modal fade" id="modal-penyakit">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Penyakit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="/admin/data-penyakit/store" method="post">
                      @csrf
                      <div class="form-group row">
                          <label for="namaPenyakit" class="col-md-4 col-form-label text-md-right">Nama Penyakit</label>
            
                          <div class="col-md-6">
                              <input id="namaPenyakit" type="text" class="form-control @error('namaPenyakit') is-invalid @enderror" name="namaPenyakit" value="{{ old('namaPenyakit') }}" required autocomplete="namaPenyakit" autofocus>
            
                              @error('namaPenyakit')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
            
                      <div class="form-group row">
                          <label for="gejala1" class="col-md-4 col-form-label text-md-right">Gejala 1</label>
            
                          <div class="col-md-6">
                              <input id="gejala1" type="text" class="form-control @error('gejala1') is-invalid @enderror" name="gejala1" value="{{ old('gejala1') }}" required autocomplete="gejala1">
            
                              @error('gejala1')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="gejala2" class="col-md-4 col-form-label text-md-right">Gejala 2</label>
            
                          <div class="col-md-6">
                              <input id="gejala2" type="text" class="form-control @error('gejala2') is-invalid @enderror" name="gejala2" value="{{ old('gejala2') }}" required autocomplete="gejala2">
            
                              @error('gejala2')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="gejala3" class="col-md-4 col-form-label text-md-right">Gejala 3</label>
            
                          <div class="col-md-6">
                              <input id="gejala3" type="text" class="form-control @error('gejala3') is-invalid @enderror" name="gejala3" value="{{ old('gejala3') }}" required autocomplete="gejala3">
            
                              @error('gejala3')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="gejala4" class="col-md-4 col-form-label text-md-right">Gejala 4</label>
            
                          <div class="col-md-6">
                              <input id="gejala4" type="text" class="form-control @error('gejala4') is-invalid @enderror" name="gejala4" value="{{ old('gejala4') }}" required autocomplete="gejala4">
            
                              @error('gejala4')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="saranDokter" class="col-md-4 col-form-label text-md-right">Saran Dokter</label>
            
                        <div class="col-md-6">
                            <textarea id="saranDokter" name="saranDokter" rows="6" class="form-control @error('saranDokter') is-invalid @enderror" name="saranDokter" value="{{ old('saranDokter') }}" required autocomplete="saranDokter"></textarea>

                            @error('saranDokter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
            
                      <div class="col-md-6 offset-md-4">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                  </form>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
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
                            <th>Saran Dokter</th>
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
                            <td class="d-flex justify-content-center">
                              <button type="button" class="btn btn-sm btn-primary modal-getDataPenyakit" data-toggle="modal" data-target="#modal-showSaranDokter" data-id="{{ $d_py['id'] }}">
                                Lihat
                              </button>
                              <div class="modal fade" id="modal-showSaranDokter">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Saran Dokter</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">
                                        <textarea class="form-control" id="showSaran_dokter" name="showSaran_dokter" rows="8"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                            </td>
                            <td>
                              <div class="row">
                                <div class="col-sm-4">
                                  <button type="button" class="btn btn-sm btn-primary modal-getDataPenyakit" data-toggle="modal" data-target="#modal-editDataPenyakit" data-id="{{ $d_py['id'] }}">
                                    Edit
                                  </button>
                                  <div class="modal fade" id="modal-editDataPenyakit">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h4 class="modal-title">Edit Data Penyakit</h4>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="/admin/data-penyakit/edit" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="editIdPenyakit" class="col-md-4 col-form-label text-md-right"></label>
                                  
                                                <div class="col-md-6 d-none">
                                                    <input id="editIdPenyakit" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                                  
                                                    @error('id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editNamaPenyakit" class="col-md-4 col-form-label text-md-right">Nama Penyakit</label>
                                  
                                                <div class="col-md-6">
                                                    <input id="editNamaPenyakit" type="text" class="form-control @error('namaPenyakit') is-invalid @enderror" name="namaPenyakit" value="{{ old('namaPenyakit') }}" required autocomplete="namaPenyakit" autofocus>
                                  
                                                    @error('namaPenyakit')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                  
                                            <div class="form-group row">
                                                <label for="editGejala1" class="col-md-4 col-form-label text-md-right">Gejala 1</label>
                                  
                                                <div class="col-md-6">
                                                    <input id="editGejala1" type="text" class="form-control @error('gejala1') is-invalid @enderror" name="gejala1" value="{{ old('gejala1') }}" required autocomplete="gejala1">
                                  
                                                    @error('gejala1')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editGejala2" class="col-md-4 col-form-label text-md-right">Gejala 2</label>
                                  
                                                <div class="col-md-6">
                                                    <input id="editGejala2" type="text" class="form-control @error('gejala2') is-invalid @enderror" name="gejala2" value="{{ old('gejala2') }}" required autocomplete="gejala2">
                                  
                                                    @error('gejala2')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editGejala3" class="col-md-4 col-form-label text-md-right">Gejala 3</label>
                                  
                                                <div class="col-md-6">
                                                    <input id="editGejala3" type="text" class="form-control @error('gejala3') is-invalid @enderror" name="gejala3" value="{{ old('gejala3') }}" required autocomplete="gejala3">
                                  
                                                    @error('gejala3')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editGejala4" class="col-md-4 col-form-label text-md-right">Gejala 4</label>
                                  
                                                <div class="col-md-6">
                                                    <input id="editGejala4" type="text" class="form-control @error('gejala4') is-invalid @enderror" name="gejala4" value="{{ old('gejala4') }}" required autocomplete="gejala4">
                                  
                                                    @error('gejala4')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editSaranDokter" class="col-md-4 col-form-label text-md-right">Saran Dokter</label>
                                  
                                                <div class="col-md-6">
                                                    <input id="editSaranDokter" type="text" class="form-control @error('saranDokter') is-invalid @enderror" name="saranDokter" value="{{ old('saranDokter') }}" required autocomplete="saranDokter">
                                  
                                                    @error('saranDokter')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                  
                                            <div class="col-md-6 offset-md-4">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                              <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        </div>
                                      </div>
                                      <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <form action="/admin/data-penyakit/{{ $d_py['id'] }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                  </form>
                                </div>
                              </div>

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

