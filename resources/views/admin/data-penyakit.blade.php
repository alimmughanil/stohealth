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
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <!-- Tambah Data Gejala -->
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Data Gejala</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body collapse">
                      <div class="row">
                        <!-- /.col -->
                        <div class="col-md-12">
                          <div class="form-group">
                            <form action="/admin/data-gejala/store" method="post">
                              @csrf
                              <label for="gejala" class="">Nama Gejala</label>
                              <input id="gejala" type="text" class="form-control @error('gejala') is-invalid @enderror" name="gejala" value="{{ old('gejala') }}" required autocomplete="gejala">
                              @error('gejala')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer collapse">        
                      <div class="col-6 offset-4">
                        <button type="button" class="btn btn-secondary" data-card-widget="collapse">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>                  
                    </form>
                    </div>
                  </div>
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Data Penyakit</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                        <!-- /.col -->
                        <div class="col-md-12">
                          <form action="/admin/data-penyakit/store" method="post">
                            @csrf
                            <div class="row form-group">
                              <div class="col">
                                <label for="namaPenyakit" class="">Nama Penyakit</label>
                                <input id="namaPenyakit" type="text" class="form-control @error('namaPenyakit') is-invalid @enderror" name="namaPenyakit" value="{{ old('namaPenyakit') }}" required autocomplete="namaPenyakit" autofocus>
                                @error('namaPenyakit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            {{-- input gejala1 --}}
                            <div class="row form-group">
                              <div class="col">
                                <label class="">Gejala 1</label>
                                <div class="select2-primary">
                                  <select class="select2" name="gejala1[]" id="gejala1" multiple="multiple" data-placeholder="Pilih gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                    @foreach ($data['dataGejala'] as $item)
                                    <option value="{{ $item->gejala }}">{{$item->gejala }}</option>
                                    @endforeach
                                  </select>
                                </div>                              
                              </div>
                            </div>
                            {{-- input gejala2 --}}
                            <div class="row form-group">
                              <div class="col">
                                <label class="">Gejala 2</label>
                                <div class="select2-primary">
                                  <select class="select2" name="gejala2[]" id="gejala2" multiple="multiple" data-placeholder="Pilih gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                    @foreach ($data['dataGejala'] as $item)
                                    <option value="{{ $item->gejala }}">{{$item->gejala }}</option>
                                    @endforeach
                                  </select>
                                </div>                              
                              </div>
                            </div>
                            {{-- input gejala3 --}}
                            <div class="row form-group">
                              <div class="col">
                                <label class="">Gejala 3</label>
                                <div class="select2-primary">
                                  <select class="select2" name="gejala3[]" id="gejala3" multiple="multiple" data-placeholder="Pilih gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                    @foreach ($data['dataGejala'] as $item)
                                    <option value="{{ $item->gejala }}">{{$item->gejala }}</option>
                                    @endforeach
                                  </select>
                                </div>                              
                              </div>
                            </div>
                            {{-- input gejala4 --}}
                            <div class="row form-group">
                              <div class="col">
                                <label class="">Gejala 4</label>
                                <div class="select2-primary">
                                  <select class="select2" name="gejala4[]" id="gejala4" multiple="multiple" data-placeholder="Pilih gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                    @foreach ($data['dataGejala'] as $item)
                                    <option value="{{ $item->gejala }}">{{$item->gejala }}</option>
                                    @endforeach
                                  </select>
                                </div>                              
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col">
                                <label for="saranDokter" class="">Saran Dokter</label>
                                  <textarea id="saranDokter" name="saranDokter" rows="6" class="form-control @error('saranDokter') is-invalid @enderror" name="saranDokter" value="{{ old('saranDokter') }}" required autocomplete="saranDokter"></textarea>
                                  @error('saranDokter')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>                  
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">        
                    <div class="col-6 offset-4">
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
                    @if (session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session('success') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>          
                    @endif
                    @if (session()->has('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        {{ $errors->input->first('namaPenyakit') }}
                        {{ $errors->input->first('gejala1') }}
                        {{ $errors->input->first('gejala2') }}
                        {{ $errors->input->first('gejala3') }}
                        {{ $errors->input->first('gejala4') }}
                        {{ $errors->input->first('saranDokter') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  @endif
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
                              <div class="row m-1 text-center">
                                <div class="col-12">
                                  <button type="button" class="btn btn-sm btn-primary modal-getDataPenyakit" data-toggle="modal" data-target="#modal-showSaranDokter" data-id="{{ $d_py['id'] }}">
                                    Lihat
                                  </button>
                                </div>
                              </div>
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
                                        <textarea class="form-control" id="showSaran_dokter" name="showSaran_dokter" rows="16"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                            </td>
                            <td>
                              <div class="row m-1">
                                <div class="col-12">
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
                                            <input id="editIdPenyakit" type="text" class="form-control d-none @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                                            <div class="form-group row">
                                              <div class="col">
                                                <label for="editNamaPenyakit" class="form-label">Nama Penyakit</label>
                                                <input id="editNamaPenyakit" type="text" class="form-control @error('namaPenyakit') is-invalid @enderror" name="namaPenyakit" value="{{ old('namaPenyakit') }}" required autocomplete="namaPenyakit" autofocus>
                                                @error('namaPenyakit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div>
                                  
                                            <div class="form-group row">
                                              <div class="col">
                                                <label for="editGejala1" class="form-label">Gejala 1</label>
                                                <input id="editGejala1" type="text" class="form-control @error('gejala1') is-invalid @enderror" name="gejala1" value="{{ old('gejala1') }}" required autocomplete="gejala1">
                              
                                                @error('gejala1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="col">
                                                <label for="editGejala2" class="form-label">Gejala 2</label>
                                  
                                                <input id="editGejala2" type="text" class="form-control @error('gejala2') is-invalid @enderror" name="gejala2" value="{{ old('gejala2') }}" required autocomplete="gejala2">
                              
                                                @error('gejala2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="col">
                                                <label for="editGejala3" class="form-label">Gejala 3</label>
                                                <input id="editGejala3" type="text" class="form-control @error('gejala3') is-invalid @enderror" name="gejala3" value="{{ old('gejala3') }}" required autocomplete="gejala3">
                              
                                                @error('gejala3')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="col">
                                                <label for="editGejala4" class="form-label">Gejala 4</label>
                                                <input id="editGejala4" type="text" class="form-control @error('gejala4') is-invalid @enderror" name="gejala4" value="{{ old('gejala4') }}" required autocomplete="gejala4">
                              
                                                @error('gejala4')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                              </div>
                                            </div>
                                            <div class="form-group row">
                                              <div class="col">
                                                <label for="editSaranDokter" class="form-label">Saran Dokter</label>
                                                <textarea id="editSaranDokter" rows="16" class="form-control @error('saranDokter') is-invalid @enderror" name="saranDokter" value="{{ old('saranDokter') }}" required autocomplete="saranDokter"></textarea>
                              
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
                              </div>
                              <div class="row m-1 text-center">
                                <div class="col-12">
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

