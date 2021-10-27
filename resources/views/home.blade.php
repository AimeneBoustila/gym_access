@extends('layouts.master')

@section('content')



        


        <div class="container-fluid">

            <div class="card-header">
                <div class="row">
                <div class="col-md-1 text-center">
                        <a style="padding:15px;" class="btn btn-info btn-block"  href="{{route('membre.create')}}" class="text-white"><i class="fa fa-user-plus" style="font-size:40px;"></i></a>
                        <label class="text-center text-white">Nouveau</label>
                    </div> 
                    <div class="col-md-1 text-center">
                        <a style="padding:15px;" class="btn btn-info btn-block text-white" 
                        type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        ><i class="fa fa-external-link-square-alt" style="font-size:40px;"></i></a>

                        <label class="text-center text-white">Libre</label>
                    </div>   

                    <div class="col-md-1 text-center">
                        <a style="padding:15px;" class="btn btn-info btn-block text-white" 
                        type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                        ><i class="fa fa-cog" style="font-size:40px;"></i></a>

                        <label class="text-center text-white">Paramètres</label>
                    </div>


                    <div class="col-md-1 text-center">
                        <a style="padding:15px;" class="btn btn-info btn-block text-white" 
                        type="button" class="btn btn-primary" data-toggle="modal" data-target="#exemple"
                        ><i class="fa fa-user" style="font-size:40px;"></i></a>

                        <label class="text-center text-white">Séance</label>
                    </div>   
                    <div class="col-md-1 text-center">
                    </div>   



                    <div class="d-flex d-lg-flex d-md-block align-items-center offset-md-4">
                            <div class="d-inline-flex align-items-center">
                                <h1 style="font-size:90px;" class="text-dark mb-1 font-weight-medium text-center" id="time-part"></h1><br>
                            </div>                                    
                        <!-- <div class="ml-auto mt-md-3 mt-lg-0">
                            <h2 class="text-dark mb-1 font-weight-medium text-center" id="date-part"></h2>                                        
                        </div> -->
                    </div>


                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">insérer une séance Libre</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form id="abonnementFform" action="{{route('presence.create')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">Tarif: </label>
                                        <input type="text" name="prix" value="400"  class="form-control"/>
                                    </div> 
                                <button class="btn btn-primary btn-block" type="submit" id="ajax_abonnement">Confirmer</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>  



                </div>
            </div>
            <div class="card-group">
                    
                    <div class="card border-right">
                        <div class="card-body" >
                            <div class="row">

                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">

                                      <div class="inner">
                                      <img src="{{asset('img/icons/member.png')}}"/>
                                        <h3>{{$inscrit ?? '' }}</h3>
                                        <p>
                                            Inscrit aujourd'hui
                                        </p>
                                      </div>
                                    </div>

                                </div>


                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">

                                      <div class="inner">
                                      <img src="{{asset('img/icons/member.png')}}"/>
                                        <h3>{{count($libres) ?? '' }}</h3>
                                        <p>
                                            Séances Libre
                                        </p>
                                      </div>
                                    </div>

                                </div>

                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                      <div class="inner">
                                          <img src="{{asset('img/icons/staff-member.png')}}"/>

                                        <h3>{{$count_presences ?? '' }}</h3>
                                        <p>
                                            Accés Aujourd'hui
                                        </p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-bag"></i>
                                      </div>
                                    </div>
                                </div>    
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                      <div class="inner">
                                      <img src="{{asset('img/icons/staff-member.png')}}"/>
                                        <h3>30</h3>
                                        <p>
                                            Ouvertures Manuelle
                                        </p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-bag"></i>
                                      </div>
                                    </div>
                                </div>    

                            </div>
                            

                            <!-- <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <canvas id="myChart" width="600" height="250"></canvas>                                
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div> -->
                        </div> 
                    </div>
            </div> 
               <div class="card mb-4">
                        <div class="card-group">
                                    <h1 style="padding:10px;">
                                        Présences Aujourd'hui
                                    </h1>
                    </div>
                    <div class="table-responsive">
                                            <table id="example1"  class="table table-striped table-bordered no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>nom Prénom</th>
                                                        <th>Date & Heure</th>
                                                        <th>Séance</th>*

                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($presences as $presence)

                                                    <tr>
                                                        <td>{{$presence->getMembre()['id'] ?? '0'}}</td>
                                                        <td>{{$presence->getMembre()['nom'] ?? 'libre '}} {{$presence->getMembre()['prenom'] ?? ''}}</td>
                                                        <td>{{$presence->created_at ?? ''}}</td>                       
                                                        <td>
                                                            <span class="badge badge-info">
                                                                @if($presence->activity == 1)
                                                                Fitness_dance
                                                                @endif
                                                                @if($presence->activity == 2)
                                                                Ventre plat
                                                                @endif

                                                                @if($presence->activity == 3)
                                                                Step
                                                                @endif

                                                                @if($presence->activity == 4)
                                                                Zomba
                                                                @endif

                                                                @if($presence->activity == 5)
                                                                Yoga
                                                                @endif

                                                                @if($presence->activity == 6)
                                                                Cross fit
                                                                @endif

                                                                @if($presence->activity == 7)
                                                                Box Musculation
                                                                @endif

                                                                @if($presence->activity == 8)
                                                                    Zomba Kids
                                                                @endif

                                                                @if($presence->activity == 9)
                                                                Circuit_training
                                                                @endif

                                                                @if($presence->activity == 10)
                                                                Fitness
                                                                @endif

                                                                @if($presence->activity == 11)
                                                                Body_sculpt
                                                                @endif


                                                            </span>

                                                        </td>                                            
                                                    </tr>

                                                    @endforeach                                            
                                                </tbody>
                                            </table>
                                        </div>
                </div> 
        </div>







<div class="modal fade" id="exemple" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Séléctionner une activité {{ session('activity')  }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                                    <form  action="{{route('activity')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="1" @if(session('activity')==1) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Fitness_dance
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="2" @if(session('activity')==2) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Ventre plat
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="3" @if(session('activity')==3) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Step
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="4" @if(session('activity')==4) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Zomba
                                                    </label>
                                                </div>


                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="5" @if(session('activity')==5) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Yoga
                                                    </label>
                                                </div>
                                                

                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="6" @if(session('activity')==6) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Cross fit
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="7" @if(session('activity')==7) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Box Musculation

                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="8" @if(session('activity')==8) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Zomba Kids
                                                    </label>
                                                </div>
                                            </div>

                                            <div class ="col-sm-4">
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="9" @if(session('activity')==9) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Circuit_training
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="10" @if(session('activity')==10) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Fitness
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label style="font-size: 1.5em">
                                                        <input type="radio" value="11" @if(session('activity')==11) checked @endif name="dz" >
                                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                        Body_sculpt
                                                    </label>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button  class="btn btn-primary" type="submit">Sauvgarder</button>
                                        </form>

              </div>
              
            </div>
          </div>
        </div>






@endsection


@section('scripts')
<script src="{{asset('js/moment.min.js')}}"></script>

<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script>
$(document).ready(function() {

          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "order": [[ 0, "desc" ]],
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
          $('.dataTables_filter').addClass('pull-left');


          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        
        $('.state').on('change',function(e){
            var id = this.id
            console.log(id)

            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/membre/state/'+id,
                dataType: 'JSON',
                success: function (data) {
                    console.log(data)
                    toastr.success('état changé');
                },
                error: function(err) { 
                    console.log(err)
                    toastr.error(err)
                }
            });
        })
});

</script>
<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                            + momentNow.format('dddd')
                             .substring(0,3).toUpperCase());
        $('#time-part').html(momentNow.format('A hh:mm:ss'));
    }, 100);

});



</script>

@endsection