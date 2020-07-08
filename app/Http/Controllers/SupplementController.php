<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Produit;
use App\Models\Supplement;
use Illuminate\Http\Request;

class SupplementController extends Controller
{
    function postAddSupplimentAndProductToCart($id , Request $request){
        //$request->session()->forget('cart');
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);

        $product = Produit::find($id);
        $cart->addProduit($product, $product->id);
        $suppliments = $request->input('suppluments');
        if(isset($suppliments)){
            foreach($request->input('suppluments') as $sup_id){
                $supplument = Supplement::find($sup_id);
                $cart->addSupliment($supplument, $supplument->id ,$id);
            }
        }
        
        $request->session()->put('cart', $cart);
        return back()->with('success','Item created successfully!');
    }

    function getRemoveSupplement($id , Request $request){
        
        $cart = $request->session()->get('cart');
        $removedItem = $cart->supplements[$id];
        $cart->totalQty -= $removedItem['qty'];
        $cart->totalPrice -= $removedItem['supplement']['prix'] * $removedItem['qty'];
        unset($cart->supplements[$id]);

        if(empty($cart->supplements) && empty($cart->products)){
            $request->session()->forget('cart');
        }else{
            $request->session()->put('cart', $cart);
        }
        
        return back()->with('success','Item created successfully!');
    }
}
