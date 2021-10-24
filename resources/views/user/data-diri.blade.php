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
                    <div class="row justify-content-center mt-2">
                      <div class="col-sm-8">
                          <form class="text-left">
                              @csrf
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
                                      <input type="text" readonly class="form-control-plaintext" id="ttl" value=": {{ $data['tempat_lahir'] }}, {{ $data['tanggal_lahir'] }}" style="width: 250px">
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
                                      <input type="text" readonly class="form-control-plaintext" id="alamat" value=": {{ $data['alamat'] }}" style="width: 250px">
                                  </div>
                              </div>

                              <div class="mt-4 d-flex justify-content-center">
                                  <button type="button" class="btn btn-primary tampilModalEditProfil m-1" data-toggle="modal" data-target="#editProfilModal" data-id="{{ $data['user_id'] }}">
                                  Edit
                                  </button>
                                  <button type="button" class="btn btn-danger tampilModalEditProfil m-1" data-toggle="modal" data-target="#editProfilModal" data-id="{{ $data['user_id'] }}">
                                  Hapus
                                  </button>
                              </div>
                          </form>
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
    
@endsection