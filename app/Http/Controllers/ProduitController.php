<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Cart;
use Session;
use App\Models\Supplement;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //
    function indexProduiut(Request $request) {
        $produits = Produit::All();
        return view('produit' , [
            'produits' =>$produits,
        ]);
    }
    function getAddToCart($id , Request $request){
        
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $product = Produit::find($id);
        $cart = new Cart($oldCart);
        $cart->addProduit($product, $product->id);
        //dd($cart);
        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        //$request->session()->forget('cart');
        return back()->with('success','Item created successfully!');
    }

    function getRemoveToCart($id , Request $request){
        
        $cart = $request->session()->get('cart');
        $removedItem = $cart->products[$id];
        $removedItem['qty']--;
        $removedItem['price'] = $removedItem['product']['prix'] * $removedItem['qty'];
        $cart->totalQty--;
        $cart->totalPrice -= $removedItem['product']['prix'];
        $cart->products[$id] = $removedItem;
        if ($removedItem['qty'] == 0){
            unset($cart->products[$id]);
        }

        if(empty($cart->products)){
            $request->session()->forget('cart');
        }else{
            $request->session()->put('cart', $cart);
        }
        
        return back()->with('success','Item created successfully!');
    }

    function getShoppingCart(Request $request) {
        //dd($request->session()->get('cart'));
        if (!Session ::has('cart')){
            return view('panier' ,[
                'produits' => null,
                'supplements' => null,
                'totale' => 0,
                'qty'=> 0,
            ]);
        }

        $cart = $request->session()->get('cart');
        //dd($cart);
        return view('panier' ,[
            'produits' => $cart->products,
            'supplements' => $cart->supplements,
            'totale' => $cart->totalPrice,
            'qty'=> $cart->totalQty
        ]);
    }

    function getPoduit ($id) {
        $produit = Produit::with('commentaire')->find($id);;
        $commenatires = $produit->commentaire;
        $suppluments = Supplement::all();
        //dd( $commenatires);
        return view('single_product', [
        'produit' =>$produit, //hna kainin les produit
        'commenatires' => $commenatires, // hna les cmnts
        'suppluments' => $suppluments
        ]);
        }
}
