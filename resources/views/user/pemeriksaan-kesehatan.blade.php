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
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                  <div class="card card-default">
                    <div class="card-header">
                      <h3 class="card-title">Identifikasi Gejala</h3>
                    </div>
                    <div class="card-body p-2">
                      <form action="/user/pemeriksaan-kesehatan/save" method="POST" class="text-left">
                        @csrf
                        <div class="form-group">
                            <div class="bs-stepper">
                              <div class="bs-stepper-header" role="tablist">
                                <!-- your steps here -->
                                <div class="step" data-target="#gejala1">
                                  <button type="button" class="step-trigger" role="tab" aria-controls="gejala1" id="gejala1-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label"></span>
                                  </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#gejala2">
                                  <button type="button" class="step-trigger" role="tab" aria-controls="gejala2" id="gejala2-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label"></span>
                                  </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#gejala3">
                                  <button type="button" class="step-trigger" role="tab" aria-controls="gejala3" id="gejala3-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label"></span>
                                  </button>
                                </div>
                                <div class="line"></div>
                                <div class="step" data-target="#gejala4">
                                  <button type="button" class="step-trigger" role="tab" aria-controls="gejala4" id="gejala4-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label"></span>
                                  </button>
                                </div>
                              </div>
                              <div class="bs-stepper-content">
                                <!-- your steps content here -->
                                <div id="gejala1" class="content" role="tabpanel" aria-labelledby="gejala1-trigger">
                                  <div class="form-group">
                                    <label for="gejala1">Pilih gejala yang kamu rasakan</label>
                                    <div class="select2-primary">
                                      <select class="form-control select2" name="gejala1[]" multiple="multiple" data-placeholder="Klik next jika tidak mengalami gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        @foreach ($data['gejala1'] as $item)
                                          <option value="{{ $item }}">{{$item }}</option>
                                        @endforeach
                                      </select>                                  
                                    </div>
                                  </div>
                                  <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="gejala2" class="content" role="tabpanel" aria-labelledby="gejala2-trigger">
                                  <div class="form-group">
                                    <label for="gejala2">Pilih gejala yang kamu rasakan</label>
                                    <div class="select2-primary">
                                      <select class="form-control select2" name="gejala2[]" multiple="multiple" data-placeholder="Klik next jika tidak mengalami gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        @foreach ($data['gejala2'] as $item)
                                          <option value="{{ $item }}">{{$item }}</option>
                                        @endforeach
                                      </select>                                  
                                    </div>
                                  </div>
                                  <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                  <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="gejala3" class="content" role="tabpanel" aria-labelledby="gejala3-trigger">
                                  <div class="form-group">
                                    <label for="gejala3">Pilih gejala yang kamu rasakan</label>
                                    <div class="select2-primary">
                                      <select class="form-control select2" name="gejala3[]" multiple="multiple" data-placeholder="Klik next jika tidak mengalami gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        @foreach ($data['gejala3'] as $item)
                                          <option value="{{ $item }}">{{$item }}</option>
                                        @endforeach
                                      </select>                                  
                                    </div>
                                  </div>
                                  <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                  <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="gejala4" class="content" role="tabpanel" aria-labelledby="gejala4-trigger">
                                  <div class="form-group">
                                    <label for="gejala4">Pilih gejala yang kamu rasakan</label>
                                    <div class="select2-primary">
                                      <select class="form-control select2" name="gejala4[]" multiple="multiple" data-placeholder="Klik next jika tidak mengalami gejala yang tersedia" data-dropdown-css-class="select2-primary" style="width: 100%;">
                                        @foreach ($data['gejala4'] as $item)
                                          <option value="{{ $item }}">{{$item }}</option>
                                        @endforeach
                                      </select>                                  
                                    </div>
                                  </div>
                                  <button type="button" class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                                  <button type="submit" class="btn btn-primary" name="idUser" value="{{ $data['id']; }}">Submit</button>
                                </div>
                              </div>
                            </div>
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