                        <div class="modal fade" id="renouvler" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ajouter Inscription</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{route('inscription.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="hidden" value="{{$membre->id ?? ''}}" name="membre2" />
                                                    <div class="form-group">
                                                        <label>Abonnement</label>
                                                        <select class="form-control" id="abonnement2" name="abonnement2">
                                                            <option value="">séléctionner un abonnement</option>
                                                            @foreach($abonnements as $abonnement)
                                                            <option value="{{$abonnement}}">{{$abonnement->label}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date début</label>
                                                        <input type="date" id="debut2"  value="{{Date('Y-m-d')}}" name="debut2" class="form-control">
                                                    </div>

                                                    


                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Tarification:</label>
                                                        <input type="number"  name="tarif2" value="0" id="tarif2" class="form-control">
                                                    </div>
                                                    
                                                </div>

                                                <div class ="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nombre de mois</label>
                                                        <input type="number"  value="{{old('nbrmois') ?? 1}}" min="1" id="nbrmois2" name="nbrmois2" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Total</label>
                                                        <input type="number" id="total2" value="{{old('total')}}" name="total2" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Remise</label>
                                                        <input type="number" value="{{old('remise') ?? 0}}" id="remise2" name="remise2" class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Assurance:</label>
                                                        <input type="number"  name="assurance" value="1000" id="assurance" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Versement</label>
                                                        <input type="number" value="{{old('versement') ?? 0}}" id="versement2" name="versement2" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>T.T.C : </label>
                                                        <input type="number" value="{{old('ttc') ?? 0}}" id="ttc2" name="ttc2" class="form-control">
                                                    </div>
                                                    

                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" id="valider2"  class="btn btn-info btn-block">Valider</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
