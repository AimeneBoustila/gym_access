@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <h1 class="mt-4 text-white"> Abonnements</h1>

                            <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Ajouter Abonnement
                                </button>
                            </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                <tr>
                                                    <th>ID abonnement</th>
                                                    <th>Activité</th>
                                                    <th>label</th>
                                                    <th>Tarif</th>
                                                    <th>actions</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($abonnements as $abonnement)
                                        <tr>
                                            <td>{{$abonnement->id ?? ''}}</td>
                                            <td>{{$abonnement->activity ?? ''}}</td>
                                            <td>{{$abonnement->label ?? ''}}</td>
                                            <td>{{$abonnement->tarif ?? ''}} DA</td>
                                            <td >
                                                <div class="table-action">  
                                                    <a  href="{{route('abonnement.destroy',['abonnement'=>$abonnement->id])}}"
                                                    onclick="return confirm('etes vous sure  ?')"
                                                    class="btn btn-danger text-white"><i class="fa fa-trash"></i> &nbsp; </a>

                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$abonnement->id}}">
                                                        <i class="fa fa-plus"></i> Modifer
                                                    </button>


                                                </div>
                                            </td>
                                        </tr>
                                        @include('includes.modals.editabo')
                                        @endforeach
                                        </tbody>



                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter abonnement</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="abonnementFform" action="{{route('abonnement.create')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Actvité: </label>
                <select class="form-control" name="activity">
                    @foreach($crenaus as $crenau)
                        <option value="circuit-tarining">
                            {{$crenau->type ?? ''}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Type: </label>

                    <div class="form-check">
                        <input class="form-check-input" value="femme" type="radio" name="type" id="type2" checked>
                        <label class="form-check-label" for="type2">
                            Femme
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Titre Abonnement: </label>
                    <input type="text" name="label"  class="form-control"/>
                </div>  
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Nombre de fois par semaine: </label>
                    <input type="number" name="nbrsemaine"  class="form-control"/>
                </div>  
                
                <div class="form-group">
                    <label class="small mb-1" for="inputFirstName">Tarif: </label>
                    <input type="number" name="tarif"  class="form-control"/>
                </div>  
                <button class="btn btn-primary btn-block" type="submit" id="ajax_abonnement">ajouter l'abonnement</button>
            </form>
      </div>
    </div>
  </div>
</div>



@endsection


@section('scripts')

<script>



</script>
@endsection
