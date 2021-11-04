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
            <div class="row justify-content-center">
              <div class="col-8">
                <div class="card">
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>          
                  @endif
                    <div class="row justify-content-center mt-2">
                      <div class="col-sm-8">
                              <!-- nama lengkap -->
                              <div class="form-group row">
                                  <div class="col">
                                      <label for="fullname" class="col-form-label">Nama Lengkap</label>
                                  </div>
                                  <div class="col">
                                      <input type="text" readonly class="form-control-plaintext" id="fullname" value=": {{ $data['name'] }}" style="width: 250px">
                                  </div>
                              </div>
                              <!-- email -->
                              <div class="form-group row">
                                  <div class="col">
                                      <label for="email" class="col-form-label">Email</label>
                                  </div>
                                  <div class="col">
                                      <input type="text" readonly class="form-control-plaintext" id="email" value=": {{ $data['email'] }}" style="width: 250px">
                                  </div>
                              </div>
                              <!-- tempat tanggal lahir -->
                              <div class="form-group row">
                                  <div class="col">
                                      <label for="ttl" class="col-form-label">Tempat, Tanggal Lahir</label>
                                  </div>
                                  <div class="col">
                                      <input type="text" readonly class="form-control-plaintext" id="ttl" value=": {{ $data['birth_place'] }}, {{ $data['birth_date'] }}" style="width: 250px">
                                  </div>
                              </div>
                              <!-- jenis kelamin -->
                              <div class="form-group row">
                                  <div class="col">
                                      <label for="gender" class="col-form-label">Jenis Kelamin</label>
                                  </div>
                                  <div class="col">
                                      <input type="text" readonly class="form-control-plaintext" id="gender" value=": {{ $data['gender'] }}" style="width: 250px">
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <div class="col">
                                      <label for="alamat" class="col-form-label">Alamat</label>
                                  </div>
                                  <div class="col">
                                      <input type="text" readonly class="form-control-plaintext" id="alamat" value=": {{ $data['address'] }}" style="width: 250px">
                                  </div>
                              </div>

                              <div class="mt-4 d-flex justify-content-center">         
                                  <button type="button" class="btn btn-sm btn-primary modal-editDataDiriPengguna m-1" data-toggle="modal" data-target="#modal-editDataDiriPengguna" data-id="{{ $data['user_id'] }}">
                                  Edit
                                  </button>
                                  <form action="/user/data-diri/{{ $data['user_id'] }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger m-1">Hapus</button>
                                  </form>
                              </div>
                      </div>
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
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
            <!-- Edit Profil Modal -->
            <div class="modal fade" id="modal-editDataDiriPengguna" tabindex="-1" role="dialog" aria-labelledby="modal-editDataDiriPenggunaLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modal-editDataDiriPenggunaLabel">Update Data Diri</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="/user/data-diri/{{ $data['user_id'] }}/edit" method="POST">
                          @method('PATCH')
                          @csrf
                          <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="name">
                          </div>
                          <div class="form-group">
                              <label for="emailUser">Email</label>
                              <input type="text" class="form-control" id="emailUser" name="email" readonly>
                          </div>
                          <div class="form-group">
                              <label for="tempat_lahir">Tempat, Tanggal Lahir</label>
                              <input type="text" class="form-control" id="tempat_lahir" name="birth_place">
                              <input type="date" class="form-control" id="tanggal_lahir" name="birth_date">
                          </div>
                          <div class="form-group">
                              <label for="gender">Jenis Kelamin</label>
                              <select class="form-control" name="gender" id="genderEdit">
                                  <option value="Pria">Pria</option>
                                  <option value="Wanita">Wanita</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="alamatUser">Alamat</label>
                              <input type="text" class="form-control" id="alamatUser" name="address">
                          </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
@endsection