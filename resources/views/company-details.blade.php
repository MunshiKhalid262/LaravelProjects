@extends('layout')
<!-- Include Quill stylesheet -->

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="display: none;">
          <div class="col-12">
            <!-- interactive chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Interactive Area Chart
                </h3>

                <div class="card-tools">
                  Real time
                  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="interactive" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          
          <!-- /.col -->

          <div class="col-md-6">
            <!-- Bar chart -->
            <canvas id="emp-bar-chart" width="800" height="450"></canvas>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-bullhorn"></i>
                    Company Details
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="callout callout-danger">
                    <h5>Company Name: {{$CompanyDetails->name}}</h5>
                    <h5>Company Email: {{$CompanyDetails->name}}</h5>

                    <p>Company Adress: {{$CompanyDetails->address}}</p>
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </div>
          </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Employees</h3>

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Age</th>
                      <th>Earning 2016</th>
                      <th>Earning 2017</th>
                      <th>Earning 2018</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($all_employees))
                      @foreach($all_employees as $employee)
                        <tr>
                          <td>{{$employee->name}}</td>
                          <td>{{$employee->email}}</td>
                          <td>{{$employee->age}}</td>
                          <td>$ {{$employee->earning_2016}}</td>
                          <td>$ {{$employee->earning_2017}}</td>
                          <td>$ {{$employee->earning_2018}}</td>
                        </tr>
                      @endforeach
                    @else
                    <tr>No Data Found!</tr>
                    @endif
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  

