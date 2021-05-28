<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Task</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.4
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/dist/js/demo.js') }}"></script>
<!--chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- Page script -->
<script>
  <script>
  $(document).ready(function(){
    $(document).on("click", "#loginBtn", function () {
      var name = document.getElementById("exampleInputFile").files[0].name;
    // alert(name);
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['doc','pdf']) == -1) 
    {
     alert("Invalid File !");
    }
    
    else
    {
     form_data.append("file", document.getElementById('exampleInputFile').files[0]);
     form_data.append("name", document.getElementById('name'));
     form_data.append("email", document.getElementById('email'));
     form_data.append("exp", document.getElementById('exp'));
     form_data.append("skill", document.getElementById('name'));
     form_data.append("contact", document.getElementById('contact'));
     form_data.append("remarks", document.getElementById('remarks'));
     form_data.append("comp_name", document.getElementById('comp_name'));
     form_data.append( "_token", '{{ csrf_token() }}' );
     $.ajax({
   
      url:"do-save-career",
      method:"POST",
      data: form_data,
      dataType: 'jsonp',
      contentType: false,
      cache: false,
      processData: false,   
      success:function(data)
      {
       var result= 'Successfully Saved Data';
       
       $(".circle").html("");
       var html = '<img class="profile-pic-change" src="'+result+'">';
       $(".circle").append(html);
      }
     });
    }
    });
  });
</script>
</script>

</body>
</html>
