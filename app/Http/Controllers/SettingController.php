<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Wilaya;
use Carbon\Carbon;
use Hash;
use App\Setting;
use App\Categorie;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SettingController extends Controller
{


    public function index()
    {
        $settings = Setting::all();
        return view('settings.index',compact('settings'));
    }

    /**
     * Show the form for creatingsetting new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Setting::setSetting('titre',$request['titre']);
        Setting::setSetting('addresse',$request['addresse']);
        Setting::setSetting('telephone',$request['telephone']);
        // Setting::setSetting('username',$request['username']);
        // Setting::setSetting('password',$request['password']);
        return redirect()->route('setting.index')->with('success', 'Success ');        
    }

        public function show($id_setting)

    {
        $setting = Setting::find($id_setting);
        return view('settings.view',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id_setting)
    {
        $setting = Setting::find($id_setting);
        return view('settings.edit',compact('setting'));
    }

    public function update(Request $request,$setting_id)
    {
        $setting = Setting::find($setting_id);  
        $setting->determination = $request['determination'];
        $setting->duree = $request['duree'];
        $setting->aspect = $request['aspect'];
        $setting->save();
        
        return redirect()->route('setting.index')->with('success', 'reservation inséré avec succés ');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_setting)
    {
        $setting = Setting::find($id_setting);
        $setting->delete();
        return redirect()->route('setting.index')->with('success', 'le Setting a été supprimé ');        
    }


}
