@extends('layouts.master')



@section('content')

<div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <h3 class="font-weight-light my-4"> Nouveau Membre  </h3>
                                        <div class="col-sm-4">
                                        </div>


                                    </div>
                                    <div class="card-body">
                                        <form role="form" action="{{route('membre.store')}}" method="post" enctype="multipart/form-data">
                                        <input id="mydata" type="hidden" name="mydata" value=""/>

                                        @csrf

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <img id="blah" src=""  width="150px" alt="" />
                                                        <div id="my_camera" ></div>

                                                        <div id="results">Your captured</div>
                                                        <div class="browse-button">
                                                            <i class="fa fa-pencil-alt"></i>
                                                            <input type='file' id="imgInp" name="image" onchange="readURL(this);" />

                                                            <input type=button value="Prendre Photo" onClick="take_snapshot()">

                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Code de Matricule</label>
                                                        <input type="text" value="{{old('matricule')}}" name="matricule" class="form-control">

                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" required value="{{old('nom')}}" name="nom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Prénom</label>
                                                        <input type="text" required value="{{old('prenom')}}" name="prenom" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input type="text" value="{{old('adresse')}}" name="adresse" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Téléphone</label>
                                                        <input type="text" value="{{old('telephone')}}" name="telephone" class="form-control">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Genre</label>
                                                        <select class="form-control" name="sexe">
                                                            <!-- <option value="homme">Homme</option>						  -->
                                                            <option value="femme">Femme</option>						                                                             
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" value="{{old('email')}}" name="email" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Group Sanguin</label>
                                                        <select class="form-control" name="sanguin">
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>

                                                        </select>

                                                    </div>


                                                </div>

                                                <div class ="col-sm-4 offset-md-4">
                                                    <div class="form-group">
                                                        <label>Type :</label>
                                                        <select class="form-control" name="sexe">
                                                            <option value="femme">Femme</option>						 
                                                            <!-- <option value="femme">Femme</option>	
                                                            <option value="mixte">mixte</option>						                                                              -->
                                                        </select>
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label>Nombre de mois</label>
                                                        <input type="number"  value="{{old('nbrmois') ?? 1}}" min="1" id="nbrmois" name="nbrmois" class="form-control">
                                                    </div>

                                                    <!-- <div class="form-group">
                                                        <label>Activités</label>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                
                                                                
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="circuit-tarining" >
                                                                    <label class="form-check-label" >
                                                                    circuit-tarining
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="Rf-cardio" >
                                                                    <label class="form-check-label" >
                                                                    Rf-cardio
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="zumba" >
                                                                    <label class="form-check-label" >
                                                                    zumba
                                                                    </label>
                                                                </div>       


                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="gym-enfants" >
                                                                    <label class="form-check-label" >
                                                                    Gym Enfants
                                                                    </label>
                                                                </div>                                                               
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="zomba-kids" >
                                                                    <label class="form-check-label" >
                                                                    Zomba Kids
                                                                    </label>
                                                                </div>     
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="crossfit" >
                                                                    <label class="form-check-label" >
                                                                    crossfit
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="zumba-strong" >
                                                                    <label class="form-check-label" >
                                                                    zumba-strong
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="ventre-plat" >
                                                                    <label class="form-check-label" >
                                                                    ventre plat
                                                                    </label>
                                                                </div>

                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="vovinam" >
                                                                    <label class="form-check-label" >
                                                                    vovinam
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="activities[]" value="yoga" >
                                                                    <label class="form-check-label" >
                                                                    yoga
                                                                    </label>
                                                                </div>

                                                                                                                         

                                                            </div>
                                                        </div>
                                                    </div> -->


                                                    <div class="form-group">
                                                        <label>Abonnement</label>
                                                        <select class="form-control" id="abonnement" name="abonnement">
                                                            <option value="">séléctionner un abonnement</option>
                                                            @foreach($abonnements as $abonnement)
                                                            <option value="{{$abonnement}}">{{$abonnement->label}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date début</label>
                                                        <input type="date" id="debut"  value="{{Date('Y-m-d')}}" name="debut" class="form-control">
                                                    </div>

                                                    

                                                    <div class="form-group">
                                                        <label>Remarque</label>
                                                        <input id="remarque" type="text" value="{{old('remarque')}}" name="remarque" class="form-control">
                                                    </div>



                                                    <div class="form-group">
                                                        <label>Tarification:</label>
                                                        <input type="number"  name="tarif" value="0" id="tarif" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Assurance:</label>

                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="assurance" value="1" id="flexRadioDefault1" checked>
                                                          <label class="form-check-label" for="flexRadioDefault1">
                                                            A Payé
                                                          </label>
                                                        </div>
                                                        <div class="form-check">
                                                          <input class="form-check-input" type="radio" name="assurance" value="0" id="flexRadioDefault2" >
                                                          <label class="form-check-label" for="flexRadioDefault2">
                                                            Non Payante
                                                          </label>
                                                        </div>

                                                    </div>


                                                    <div class="form-group">
                                                        <label>Total</label>
                                                        <input type="number" id="total" value="{{old('total')}}" name="total" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Remise</label>
                                                        <input type="number" value="{{old('remise') ?? 0}}" id="remise" name="remise" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Versement</label>
                                                        <input type="number" value="{{old('versement') ?? 0}}" id="versement" name="versement" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Total Final : </label>
                                                        <input type="number" value="{{old('ttc') ?? 0}}" id="ttc" name="ttc" class="form-control">
                                                    </div>


                                                </div>


                                                <div class ="col-sm-4">

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-2" style="padding:30px;">
                                                    <button style="padding:30px;font-size:30px;" type="submit" id="valider"  class="btn btn-info btn-block">Valider</button>
                                                </div>
                                                <div class="col-md-2" style="padding:30px;">
                                                    <button style="padding:30px;font-size:30px;" 
                                                    onclick="window.history.go(-1); return false;"

                                                     class="btn btn-danger btn-block">Annuler</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>



                                <!-- <div class="card mt-2">
                                    <div class="card-header"><h3 class="font-weight-light my-4"> Type d'abonnement  </h3></div>
                                    <div class="card-body">
                                            <div class="row">

                                            </div>

                                        </form>
                                    </div>
                                </div> -->



                            </div>

                        </div>

                    </div>
@endsection
@section('scripts')
<script src="{{asset('js/webcam.min.js')}}"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                console.log(e.target)
                $('#blah')
                    .attr('src', e.target)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                
                document.getElementById('mydata').value = raw_image_data;
                // document.getElementById('myform').submit();
				document.getElementById('blah').src = data_uri

            } );
		}

$(document).ready(function() {

		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera'  );
    
    $('#today').on('click',function(){
        var date = new Date();
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;
        var today = year+ "-" +month+ "-" +day;//+"-"+// + "-" +  +"T00:00";       
        $("#debut").attr("value", today);

    })
    $('#abonnement').on('change',function(event){
        var value = JSON.parse(this.value);
        var remise = $('#remise').val();
        console.log(ttc)
        var assurance = $('#tarif').val()
        $('#tarif').val(value.tarif)
        $('#total').val($('#nbrmois').val()*$('#tarif').val())
        $('#versement').val($('#nbrmois').val()*$('#tarif').val())

    
        var total =  $('#total').val()
        console.log(ttc)
        var ttc = total - remise 
        $('#ttc').val(ttc)

    })
    $('#remise').on('change',function(){
        var remise = this.value;
        var total =  $('#total').val()
        var ttc = total - remise 
        $('#ttc').val(ttc)

    })
    $('#nbrmois').on('change',function(event){
        var value = this.value;
        var debut = new Date($('#debut').val());
        var fin  = debut.setMonth(debut.getMonth()+value); 
        var remise = $('#remise').val();
        $('#total').val(value*$('#tarif').val())
        $('#versement').val(value*$('#tarif').val())
        $('#fin').val(fin)
        var total =  $('#total').val()
        console.log(ttc)
        var ttc = total - remise 
        $('#ttc').val(ttc)

    })

});

</script>
@endsection


