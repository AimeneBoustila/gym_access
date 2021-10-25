<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presence;
use App\Abonnement;
use App\Inscription;
use App\Membre;
use Carbon\Carbon;

class InscriptionController extends Controller
{
    public function index()
    {
        $abonnements = Abonnement::all();        
        $inscriptions = Inscription::all();        
        return view('inscriptions.index',compact('inscriptions','abonnements'));
    }



    
    public function presence($inscription_id)
    {
        // $presences = Presence::where('inscription',$inscription_id)->get();
        $presences = Presence::where('inscription',$inscription_id)->get();
        return view('inscriptions.presences',compact('presences'));

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'abonnement2'=>'required',
        ]);
        $membre = Membre::find($request->membre2);

        $inscription  = Inscription::where('membre',$membre->id)->first();
        $inscription->etat = 0;
        $inscription->save();


        $inscription = new Inscription();
        $inscription->debut=$request['debut2'];
        $inscription->remarque=$request['remarque2'];
        $inscription->type=$request['type2'];
        //$inscription->activities=$request['activity2'];
        $fin =  Carbon::parse($request['debut2'])->addMonth($request['nbrmois2'])->format('Y-m-d');
        $inscription->fin=$fin;
        
        $inscription->nbsseance=$request['nbrmois2']*4*json_decode($request['abonnement2'])->nbrsemaine;
        $inscription->reste=$request['nbrmois2']*4*json_decode($request['abonnement2'])->nbrsemaine;
        
        $inscription->membre=$membre->id;
        $inscription->abonnement=json_decode($request['abonnement2'])->id;
        $inscription->etat=1;
        $inscription->total=$request['total2'];
        $inscription->remise=$request['remise2'];
        $inscription->nbrmois=$request['nbrmois2'];
        $inscription->versement=$request['versement2'];
        

        $inscription->save();
      
        
        return redirect()->route('membre.index')->with('success', ' inséré avec succés ');          
    }
}
