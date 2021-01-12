<?php

namespace App\Http\Controllers;

use App\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Voiture::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Voiture::create($request->all())){
            return response()->json([
            'success'=> 'Voiture créée avec succés'
            ]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Voiture $voiture)
    {
        return  $voiture;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $voiture)
    {
         if($voiture->update($request->all())){
            return response()->json([
            'success'=> 'Voiture modifiée avec succés'
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $voiture)
    {
        if($voiture->delete()){
            return response()->json([
            'success'=> 'Voiture supprimer avec succés'
            ]);
        };
    }
}
