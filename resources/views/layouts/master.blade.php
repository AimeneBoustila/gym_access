
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion Salle du sport</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <link href="{{asset('adminlte/plugins/toastr/toastr.css')}}" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <link href="{{asset('css/timepicker.css')}}" rel="stylesheet" />
  <style>

.checkbox label:after, 
.radio label:after {
    content: '';
    display: table;
    clear: both;
}

.checkbox .cr,
.radio .cr {
    position: relative;
    display: inline-block;
    border: 1px solid #a9a9a9;
    border-radius: .25em;
    width: 1.3em;
    height: 1.3em;
    float: left;
    margin-right: .5em;
}

.radio .cr {
    border-radius: 50%;
}

.checkbox .cr .cr-icon,
.radio .cr .cr-icon {
    position: absolute;
    font-size: .8em;
    line-height: 0;
    top: 50%;
    left: 20%;
}

.radio .cr .cr-icon {
    margin-left: 0.04em;
}

.checkbox label input[type="radio"],
.radio label input[type="radio"] {
    display: none;
}

.checkbox label input[type="radio"] + .cr > .cr-icon,
.radio label input[type="radio"] + .cr > .cr-icon {
    transform: scale(3) rotateZ(-20deg);
    opacity: 0;
    transition: all .3s ease-in;
}

.checkbox label input[type="radio"]:checked + .cr > .cr-icon,
.radio label input[type="radio"]:checked + .cr > .cr-icon {
    transform: scale(1) rotateZ(0deg);
    opacity: 1;
}

.checkbox label input[type="radio"]:disabled + .cr,
.radio label input[type="radio"]:disabled + .cr {
    opacity: .5;
} 

@media (min-width: 992px) {
  .modal-lg {
    width: 900px;
  }
}













    .content-wrapper{
      background-image:url('/img/cc1.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    }

  .pull-left{
    float: left !important;
    }

  .td-success {
    background-color: #dff0d8 !important;
  }

  .td-error {
    background-color: #f2dede !important;
  } 

  </style>
  @yield('styles')
</head>

<body class="hold-transition layout-top-nav">


<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/home" class="navbar-brand">
        <span class="brand-text font-weight-light">Salle du sport</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{route('membre.index')}}" class="nav-link">
            <i class="fa fa-user"></i>
            Membres
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('abonnement.index')}}" class="nav-link">
            <i class="fa fa-calendar"></i>
              Abonnement
              </a>
          </li>

          <li class="nav-item">
            <a href="{{route('inscription.index')}}" class="nav-link">
            <i class="fa fa-calendar"></i>
            Inscriptions
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{route('activitie.index')}}" class="nav-link">
            <i class="fa fa-bicycle"></i>
            Activités
            </a>
          </li> -->
          <li class="nav-item">
            <a href="{{route('crenau.index')}}" class="nav-link">
            <i class="fa fa-bicycle"></i>
            Planing
            </a>
          </li>


          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Rapport</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{route('stats')}}" class="dropdown-item">Statistique </a></li>
            <li><a href="{{route('rapport')}}" class="dropdown-item">Rapport Inscriptions </a></li>
              <li><a href="{{route('libres')}}" class="dropdown-item">Rapport Séance Libre </a></li>
              <li><a href="{{route('activities')}}" class="dropdown-item">Rapport Des Activités </a></li>



              <!-- Level two dropdown-->
             
              <!-- End Level two -->
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{route('setting.index')}}" class="nav-link">
            <i class="fa fa-sliders"></i>
            Paramètres
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li> -->
        </ul>

        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="">

  <!-- Content Header (Page header) -->
    @yield('header')
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            @yield('content')
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
<script src="{{asset('adminlte/plugins/toastr/toastr.min.js')}}"></script>

@yield('scripts')


<script>
$(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
});
      var profile = 0;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

       setInterval(function(){ 
        
        myObject = {}; //myObject[numberline] = "textEachLine";
        $.get('/profile.txt', function(myContentFile) {
           var lines = myContentFile.split("\r\n");
           for(var i  in lines){
              if(lines[i] != '0'){
                // WRITE ZERO
                //window.location.replace("http://localhost:8000/membre/profile/"+lines[i]);
                $.ajax({
                  type: 'POST',
                  data: {line: lines[i], _token: CSRF_TOKEN},
                  dataType: 'JSON',
                  url: "/write", // url of receiver file on server
                  success: function(success){
                    console.log("success")
                     var str = lines[i].substring(0, lines[i].length-2);

                    window.location.replace("http://localhost:8000/membre/profile/"+str);
                  },
                  error:function(err){
                    console.log(err)
                  }
                });
              }
              //print in console
              console.log("line " + i + " :" + lines[i]);
           }
        }, 'text');

//        window.location.replace("http://localhost:8000/membre");

      }, 2000);


        @if(session('success'))
            $(function(){
                toastr.success('{{Session::get("success")}}')
            })
        @endif
        @if ($errors->any())
            $(function(){
                @foreach ($errors->all() as $error)
                        toastr.error('{{$error}}')
                @endforeach
            })
        @endif
        @if(session('error'))
            $(function(){
                toastr.error('{{Session::get("error")}}')
            })
        @endif
</script>


</body>
</html>
