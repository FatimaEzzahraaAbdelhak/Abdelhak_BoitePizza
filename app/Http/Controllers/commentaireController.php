<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;

class commentaireController extends Controller
{
    function postComment($clinet_id , $produit_id , Request $request){
        $data = $request->only(['texte']);
        $data['client_id'] = $clinet_id;
        $data['produit_id'] = $produit_id;
        $commenatire = Commentaire::create($data);
        return back()->with('success','Comment successfully!');
        }
}
