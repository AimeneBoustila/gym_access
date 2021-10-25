<?php



namespace App\Http\Controllers;

use App\Presence;
use App\Membre;
use App\Abonnement;
use App\Inscription;
use App\Ouverture;
use DB;
use Carbon\Carbon;
use Storage;
use App\Setting;
use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{

    public function index()
    {
        $presences = Presence::whereDate('created_at', Carbon::today())->get();
        $inscrit = Inscription::where('created_at', Carbon::today())->get();
        $inscrit = count($inscrit);
        $count_presences = count($presences);
        $inscriptions = Inscription::where('created_at', Carbon::today())->get();
        $membres = Membre::whereDate('created_at', Carbon::today())->get();
        $ouvertures = Ouverture::whereDate('created_at', Carbon::today())->get()->count();
        $libres = Presence::where('type',1)->get();
              
        return view('home',compact('presences','membres','inscrit','presences','count_presences','inscriptions','ouvertures','libres'));    
    }

    public function libres()
    {
        $benefice = Presence::where('type',1)->sum('prix');
        $libres = Presence::where('type',1)->get();

        $presences = Presence::all();
        
        return view('libres',compact('benefice','libres','presences'));
    }


    public function activities()
    {
        $benefice = Presence::where('type',1)->sum('prix');
        $libres = Presence::where('type',1)->get();
        $presences = Presence::all();
        
        return view('activities',compact('benefice','libres','presences'));
    }




    public function FilterActivities(Request $request)
    {

        $result = Presence::query();
        $date_fin="";
        $date_debut="";
        if (!empty($request['date_debut'])) {
            $date_debut=$request['date_debut'];    
            $result = $result->whereDate('created_at', '=', $request['date_debut']);
        }

        if (!empty($request['date_fin'])) {
            $date_fin=$request['date_fin'];    
            $result = $result->whereDate('created_at', '<=', $request['date_fin']);
        }


        if (!empty($request['a'])) {
            $a=$request['a'];    
            $result = $result->where('activity', '=', $a);
        }
        $presences = $result->get();
        
        return view('activities',compact('benefice','libres','presences','date_debut'));
    }

    public function stats()
    {
        $presences = Presence::whereDate('created_at', Carbon::today())->get();
        $inscriptions = Inscription::all();//('created_at', Carbon::today())->get();
        $countInscriptions = count($inscriptions);

        $count_presences = count($presences);
        $inscriptions = Inscription::where('created_at', Carbon::today())->get();
        $membres = Membre::whereDate('created_at', Carbon::today())->get();
        $ouvertures = Ouverture::whereDate('created_at', Carbon::today())->get()->count();
        $libres = Presence::where('type',1)->get();
        $countLibre = count($libres);
        $benefice = Inscription::all()->sum('total');
        $assurance = Membre::where('assurance',1)->get()->count();

        $totalAssurance = $assurance*1000;


        return view('stats',compact('assurance','totalAssurance','presences','membres','inscrit','presences','count_presences','inscriptions','ouvertures','libres','countInscriptions','countLibre','benefice'));    

    }

    public function statsFilter(Request $request)
    {

        $result = Inscription::query();
        $result2 = Presence::query();
        $result3 = Membre::query();

        $date_fin="";
        $date_debut="";

        if (!empty($request['date_debut'])) {
            $date_debut=$request['date_debut'];    
            $result = $result->whereDate('created_at', '>=', $request['date_debut']);
            $result2 = $result2->whereDate('created_at', '>=', $request['date_debut'])->where('type',1);
            $result2 = $result3->whereDate('created_at', '>=', $request['date_debut']);//->where('assurance',1);
        }

        if (!empty($request['date_fin'])) {
            $date_fin=$request['date_fin'];    
            $result = $result->whereDate('created_at', '<=', $request['date_fin']);
            $result2 = $result2->whereDate('created_at', '<=', $request['date_debut'])->where('type',1);
            $result3 = $result3->whereDate('created_at', '<=', $request['date_debut']);//->where('assurance',1);
  
        }

        $inscriptions = $result->get();
        $countInscriptions = count($inscriptions);
            dd($result2->get());
        $libres = $result2->get();
        dd($libres);
        $assurance = count($result3->get());

        $totalAssurance = $assurance*1000;

        $libres = $result2->get();//Presence::where('type',1)->get();
        $countLibre = count($libres);

        $benefice = $result->get()->sum('total');
        $nombreInscriptions = count($inscriptions);
        $assurance = Membre::where('assurance',1)->get()->count();

        return view('stats',compact('inscriptions',
            'date_debut',
            'assurance',
            'libres',
            'date_fin',
            'assurance',
            'countLibre',
            'totalAssurance',
            'benefice',
            'countInscriptions'
        ));

    }


    public function write(Request $request)
    {
        if($request->ajax()){
            Storage::put('profile.txt', '0');
            return response()->json(['error' => 0]);
        }
        
    }


    public function activity(Request $request)
    {
        $setting = Setting::where('titre','activity')->first();
        $setting->value = $request['dz'];
        $setting->save();
        return redirect()->back()->with('success', 'success');                
    }

    public function rapport()
    {
        $abonnements = Abonnement::all();        
        $inscriptions = Inscription::all();        
        $benefice = Inscription::all()->sum('total');
        $libres = Presence::where('type',1)->get();
        $assurance = Membre::where('assurance',1)->get()->count();
        $assurance = $assurance*1000;  
        return view('rapport',compact('inscriptions','abonnements','benefice','libres','assurance'));
    }

    public function filter(Request $request)
    {
        $result = Inscription::query();
        $result2 = Presence::query();
        $date_fin="";
        $date_debut="";

        if (!empty($request['date_debut'])) {
            $date_debut=$request['date_debut'];    
            $result = $result->whereDate('created_at', '>=', $request['date_debut']);
            $result2 = $result2->whereDate('created_at', '>=', $request['date_debut']);
        }

        if (!empty($request['date_fin'])) {
            $date_fin=$request['date_fin'];    
            $result = $result->whereDate('created_at', '<=', $request['date_fin']);
            $result2 = $result2->whereDate('created_at', '<=', $request['date_debut']);   
        }

        $inscriptions = $result->get();
        $libres = $result2->get();
        $benefice = $result->get()->sum('total');
        $nombreInscriptions = count($inscriptions);
        $assurance = Membre::where('assurance',1)->get()->count();
        $assurance = $nombreInscriptions*1000;
        return view('rapport',compact('inscriptions',
            'date_debut',
            'assurance',
            'libres',
            'date_fin',
            'benefice',
            'nombreInscriptions'
        ));

    }

    public function search(Request $request)
    {

        $wheres = "";
        $index = 0;
        $type = "";
        $debut_entre = "";
        $fin_entre ="";
        if($request['table']){
            $table = $request['table'];
            $categorie = $request['categorie'];
            
            if ($table == 'fournisseurs') {
                $sql ="select * from $table where id in (select fournisseur from categoriquements where categorie='$categorie')";
                $fournisseurs = DB::select(DB::raw($sql));        
                return view('providers',compact('fournisseurs'));                    
            }else{
                $sql ="select * from $table where categorie='$categorie'";
                $produits = DB::select(DB::raw($sql));        
                return view('providers',compact('produits'));    
            }
        }



    }



}

