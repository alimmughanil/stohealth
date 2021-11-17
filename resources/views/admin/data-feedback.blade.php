@extends('layouts.main')

@section('feedback')
  @include('admin.feedback-navbar')
@endsection

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
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Waktu</th>
                            <th>Pesan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1 ?>
                        @foreach ($data['dataFeedback'] as $feedback)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $feedback['name'] }}</td>
                            <td>{{ $feedback['email'] }}</td>
                            <td>{{ $feedback['phone'] }}</td>
                            <td>{{ $feedback['created_at'] }}</td>
                            <td class="d-flex justify-content-center">
                              <button type="button" class="btn btn-sm btn-primary modal-feedbackFeedback" data-toggle="modal" data-target="#modal-feedback" data-id="{{ $feedback['id'] }}">
                                Lihat
                              </button>
                              <div class="modal fade" id="modal-feedback">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title">Feedback Message</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="modal-body">
                                        <form action="" method="">
                                            @csrf
                                            <div class="form-group">
                                                <textarea class="form-control" id="feedbackMessages" name="feedbackMessages" rows="12"></textarea>
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