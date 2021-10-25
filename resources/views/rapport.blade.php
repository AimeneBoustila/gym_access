@extends('layouts.master')

@section('content')
        <div class="container-fluid">

            <div class="card-header">
                <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                      <div class="inner">
                                      
                                        <h3>{{$benefice ?? ''}}</h3>
                                        <p>
                                            Bénéfice Total 
                                        </p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-bag"></i>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                      <div class="inner">
                                      
                                        <h3>{{$assurance ?? ''}}</h3>
                                        <p>
                                            Assurance 
                                        </p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-bag"></i>
                                      </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-info">
                                      <div class="inner">
                                        <h3>{{$nombreInscriptions ?? count($inscriptions)}}</h3>
                                        <p>
                                            Nombre Inscriptions
                                        </p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-bag"></i>
                                      </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-warning">
                                      <div class="inner">
                                        <?php
                                            $i = 0;
                                        ?>
                                        @foreach($libres as $libre)
                                            @if($libre->type == 1)
                                            <?php
                                                $i++;
                                            ?>

                                            @endif
                                        @endforeach

                                        <h3>{{ $i }}</h3>
                                        <p>
                                            Séances Libre
                                        </p>
                                      </div>
                                      <div class="icon">
                                        <i class="ion ion-bag"></i>
                                      </div>
                                    </div>
                                </div>

                                
    
                            </div>

                </div>
            </div>
            <div class="card-group">
            </div> 
               <div class="card mb-4">
                        <div class="card-group">
                                    

                                    <form method="post" action="{{route('rapport.filter')}}">                                                    
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-4" >
                                                        <label class="control-label">{{ __('Début') }}: </label>
                                                        <input class="form-control" value="{{$date_debut ?? ''}}" name="date_debut" type="date" />
                                                    </div>

                                                    <div class="col-md-4" >
                                                        <label class="control-label">{{ __('Fin') }}: </label>
                                                        <input class="form-control" value="{{$date_fin ?? ''}}" name="date_fin" type="date" />
                                                    </div>

                                                    <div class="col-md-4" style="padding:35px;">
                                                        <button type="submit" class="row btn btn-primary" >
                                                            Filtrer
                                                        </button>                                                                                                        
                                                    </div>


                                        </form>
                    </div>
                    <table id="example1"  class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Membre</th>
                                                <th>debut</th>
                                                <th>fin</th>
                                                <th>Nombre seance reste</th>
                                                <th>nbr seances</th>
                                                <th>abonnement</th>
                                                <th>etat</th>
                                                <th>total</th>
                                                <th>remise</th>
                                                <th>nbrmois</th>
                                                <th>versement</th>
                                                <th>actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inscriptions as $inscription)
                                            <tr 
                                            class="
                                            @if($inscription->etat == 1)
                                            td-success
                                            @else
                                            td-error
                                            @endif"
                                            >
                                                <td>
                                                    {{$inscription->getMembre()['nom'] ?? ''}}
                                                    {{$inscription->getMembre()['prenom'] ?? ''}}
                                                </td>
                                                <td>{{$inscription->debut ?? ''}}</td>
                                                <td>{{$inscription->fin ?? ''}}</td>
                                                <td>{{$inscription->reste ?? ''}}</td>
                                                <td style="text-align:center;">{{$inscription->nbsseance ?? ''}}</td>
                                                <td>{{$inscription->getAbonnement()['label'] ?? ''}}</td>
                                                <td>
                                                    <span class="badge badge-info"> 

                                                    @if($inscription->etat == 1)
                                                        Active
                                                    @else
                                                        Non Active
                                                    @endif

                                                    </span>
                                                </td>
                                                <td>{{$inscription->total ?? ''}}DA</td>
                                                <td>{{$inscription->remise ?? ''}}</td>

                                                <td style="text-align:center;">
                                                    {{$inscription->nbrmois ?? ''}}
                                                </td>                                            
                                                <td>{{$inscription->versement ?? ''}} DA</td>

                                                <td>
                                                    <a class="btn btn-info text-white" href="{{route('inscription.presence',['inscription'=>$inscription->id])}}">
                                                        <i class="fa fa-list"></i>
                                                        Présences
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach                                            
                                        </tbody>
                                    </table>

                </div> 
        </div>


@endsection


@section('scripts')
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/chart.js')}}"></script>

<script>
$(document).ready(function() {
    var interval = setInterval(function() {
        var momentNow = moment();
        $('#date-part').html(momentNow.format('YYYY MMMM DD') + ' '
                            + momentNow.format('dddd')
                             .substring(0,3).toUpperCase());
        $('#time-part').html(momentNow.format('A hh:mm:ss'));
    }, 100);
aDatasets1 = [65,59,80,81,56,55,40,47];  
aDatasets2 = [20,30,40,50,60,20,25,47];
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Samedi", "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi","vendredi"],
        
        datasets: [ {
              label: 'Homme',
              fill:false,
            data: aDatasets1,

            backgroundColor: '#E91E63',
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
            ],
            borderWidth: 1
        },
        
        {
            label: 'Femme',
              fill:false,
            data: aDatasets2,
            backgroundColor: 
                '#3F51B5'
            ,
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
            ],
            borderWidth: 1
        }
        
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        title: {
            display: true,
            text: 'Membre par semaine'
        },
        responsive: true,
        
       tooltips: {
            callbacks: {
                labelColor: function(tooltipItem, chart) {
                    return {
                        borderColor: 'rgb(255, 0, 20)',
                        backgroundColor: 'rgb(255,20, 0)'
                    }
                }
            }
        },
        legend: {
            labels: {
                // This more specific font property overrides the global property
                fontColor: 'red',
               
            }
        }
    }
});

});



</script>

@endsection