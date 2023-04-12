<?php

namespace App\Http\Controllers;

use App\Models\Sauce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SauceController extends Controller
{
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces', compact('sauces'));
    }

    public function show($id)
    {
        $sauce = Sauce::find($id);
        return view('sauce', compact('sauce'));
    }

    public function destroy($id)
    {
        if (request()->isMethod('delete')) {
            $sauce = Sauce::findorfail($id);
            $sauce->delete();
            return redirect()->route('sauces')->with('success', 'Sauce supprimée ! ');
        } else {
            abort(405);
        }
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'manufacturer' => 'required',
        'description' => 'required',
        'imageUrl' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ajouter la validation pour le champ d'image
    ]);

    $imagePath = null; // Variable pour stocker le chemin d'accès de l'image

    if ($request->hasFile('imageUrl')) {
        $image = $request->file('imageUrl');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
    }

    // Récupérer l'utilisateur authentifié
    $user = auth()->user();

    // Créer une nouvelle instance du modèle 'Sauce' avec les données du formulaire
    $sauce = new Sauce([
        'userId' => $user->id, // Utiliser l'ID de l'utilisateur authentifié
        'name' => $request->input('name'),
        'manufacturer' => $request->input('manufacturer'),
        'description' => $request->input('description'),
        'imageUrl' => $imagePath, // Enregistrer le chemin d'accès de l'image dans la base de données
        'mainPepper' => $request->input('mainPepper'),
        'heat' => $request->input('heat'),
    ]);

    $sauce->save(); // Sauvegarder la sauce dans la base de données

    return redirect()->route('sauces')->with('success', 'La sauce a été créée avec succès !');
}


    public function add(){
        return view('add');
    }

    public function edit($id)
{
    $sauce = Sauce::find($id); 
    return view('sauces.edit', compact('sauce')); 
}

public function update(Request $request, $id)
{
    $sauce = Sauce::find($id); // Récupérer la sauce à modifier

    // Valider les données du formulaire de modification
    $request->validate([
        'name' => 'required',
        'heat' => 'required|numeric|min:1|max:10',
        'description' => 'required',
        'mainPepper' => 'required',
        'manufacturer' => 'required',
        'imageUrl' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Mettre à jour les informations de la sauce
    $sauce->name = $request->input('name');
    $sauce->heat = $request->input('heat');
    $sauce->description = $request->input('description');
    $sauce->mainPepper = $request->input('mainPepper');
    $sauce->manufacturer = $request->input('manufacturer');

    // Vérifier si une nouvelle image a été envoyée
    if ($request->hasFile('imageUrl')) {
        // Supprimer l'ancienne image si elle existe
        if ($sauce->imageUrl) {
            // Construire le chemin d'accès complet à l'ancienne image
            $oldImagePath = public_path($sauce->imageUrl);

            // Vérifier si l'ancienne image existe avant de la supprimer
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); 
            }
        }

        // Enregistrer la nouvelle image
        $image = $request->file('imageUrl');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
        $sauce->imageUrl = $imagePath;
    }

    // Enregistrer les modifications dans la base de données
    $sauce->save();

    // Rediriger vers la page de détails de la sauce avec un message de succès
    return redirect()->route('sauces.show', $sauce->id)->with('success', 'La sauce a été modifiée avec succès.');
}



    
public function like($id)
{
    $sauce = Sauce::findOrFail($id);

    // Vérifier si l'utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();

        // Vérifier si l'utilisateur n'a pas déjà liké la sauce
        if (!$sauce->likedBy->contains($user)) {
            $sauce->likedBy()->attach($user->id);
            $sauce->increment('likes', 1);

            // Vérifier si l'utilisateur avait déjà disliké la sauce
            if ($sauce->dislikedBy->contains($user)) {
                $sauce->dislikedBy()->detach($user->id);
                $sauce->decrement('dislikes', 1);
            }
        } else {
            $sauce->likedBy()->detach($user->id);
            $sauce->decrement('likes', 1);
        }
    }

    return redirect()->back();
}

public function dislike($id)
{
    $sauce = Sauce::findOrFail($id);

    // Vérifier si l'utilisateur est connecté
    if (Auth::check()) {
        $user = Auth::user();

        // Vérifier si l'utilisateur n'a pas déjà disliké la sauce
        if (!$sauce->dislikedBy->contains($user)) {
            $sauce->dislikedBy()->attach($user->id);
            $sauce->increment('dislikes', 1);

            // Vérifier si l'utilisateur avait déjà liké la sauce
            if ($sauce->likedBy->contains($user)) {
                $sauce->likedBy()->detach($user->id);
                $sauce->decrement('likes', 1);
            }
        } else {
            $sauce->dislikedBy()->detach($user->id);
            $sauce->decrement('dislikes', 1);
        }
    }

    return redirect()->back();
}



}