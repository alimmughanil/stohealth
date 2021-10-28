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
              <div class="col-6">
                <div class="card">
                  <h5 class="card-header">Pilih gejala yang anda alami!</h5>
                  <div class="card-body">
                    <form action="/user/pemeriksaan-kesehatan/save" method="POST" class="text-left">
                      @csrf
                      <div class="form-group">
                          <label for="gejala1">Gejala 1</label>
                          <select class="form-control" name="gejala1" id="gejala1">
                          <option value="">Tidak Ada</option>
                          @foreach ($data['dataPenyakit'] as $gejala)
                            <option value="{{ $gejala['gejala1'] }}">{{ $gejala['gejala1'] }}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="gejala2">Gejala 2</label>
                          <select class="form-control" name="gejala2" id="gejala2">
                          <option value="">Tidak Ada</option>
                          @foreach ($data['dataPenyakit'] as $gejala)
                            <option value="{{ $gejala['gejala2'] }}">{{ $gejala['gejala2'] }}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="gejala3">Gejala 3</label>
                          <select class="form-control" name="gejala3" id="gejala3">
                          <option value="">Tidak Ada</option>
                          @foreach ($data['dataPenyakit'] as $gejala)
                            <option value="{{ $gejala['gejala3'] }}">{{ $gejala['gejala3'] }}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="gejala4">Gejala 4</label>
                          <select class="form-control" name="gejala4" id="gejala4">
                          <option value="">Tidak Ada</option>
                          @foreach ($data['dataPenyakit'] as $gejala)
                            <option value="{{ $gejala['gejala4'] }}">{{ $gejala['gejala4'] }}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="mt-2">
                          <button type="submit" class="btn btn-primary" name="idUser" value="{{ $data['id']; }}">Submit</button>
                      </div>
                  </form>
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