<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Exception;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categorie=Categorie::all();
            return response()->json($categorie);
        }
        catch (Exception $e)
        {
            return response().json_decode("probleme de recuperation de la liste des categories");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categorie=new Categorie([
                "nomcategorie"=>$request->input("nomcategorie"),
                "imagecategorie"=>$request->input("imagecategorie")
            ]);
            $categorie->save();
            return response()->json($categorie);
        }catch(\Exception $e)
        {
            return response()->json("insert impossible");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try
        {
            $categorie=Categorie::findOrfail($id);
            return response()->json($categorie);
        }catch(\Exception $e)
        {
            return response()->json("cannot get categorie by id");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try
        {
        $categorie=Categorie::findOrfail($id);
        $categorie->update($request->all());
        return response()->json($categorie);
        }
        catch(\Exception $e)
        {
            return response()->json('Cannot update the categorie');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try
        {
            $categorie=Categorie::findOrfail($id);
            $categorie->delete();
            return response()->json("categorie supprimée avec succées");
        }
        catch(\Exception $e)
        {
            return response()->json("cannot delete categorie");
        }
    }
}
