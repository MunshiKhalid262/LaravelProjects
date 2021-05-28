@extends('layout')
<!-- Include Quill stylesheet -->

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- /.row -->

        <div class="row">
          <!-- /.col -->

          
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Save Career</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="createGroup" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email">
                  </div>
                  <span class="emailErr error" style=" color:red;"></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  <span class="compName error" style=" color:red;"></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact Number</label>
                    <input type="number" name="contact" class="form-control" id="contact" placeholder="Enter Contact Number">
                  </div>
                  <span class="contactError error" style=" color:red;"></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Total Experience</label>
                    <input type="text" name="experience" class="form-control" id="exp" placeholder="Enter Total Experience in Years">
                  </div>
                  <span class="contactError error" style=" color:red;"></span>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Skillsets</label>
                    <input type="text" name="skills" class="form-control" id="skill" placeholder="Enter Skillsets">
                  </div>
                  <span class="address error" style=" color:red;"></span>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Company name</label>
                    <input type="text" name="comp_name" class="form-control" id="comp_name" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Additional Remarks</label>
                    <input type="text" name="remarks" class="form-control" id="remarks" placeholder="Enter Remarks">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Resume</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="resume" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose pdf file</label>
                      </div>
                      
                    </div>
                  </div>
                  <span class="file error" style=" color:red;"></span>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="loginBtn" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection

