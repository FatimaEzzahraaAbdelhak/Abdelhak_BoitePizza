<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products = null;
    public $supplements = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->products = $oldCart->products;
            $this->supplements = $oldCart->supplements;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addProduit($product, $id){
        $storedItem = ['qty' => 0, 'price' => $product->prix, 'product' => $product];

        
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $storedItem = $this->products[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $product->prix * $storedItem['qty'];
        $this->products[$id] = $storedItem;

        $this->totalQty++;
        $this->totalPrice += $product->prix;
    }

    public function addSupliment($supplement, $id, $product_id ){
        $produits=[];
        $storedItem = ['qty' => 0,'produits'=>$produits, 'price' => $supplement->prix, 'supplement' => $supplement];

        if($this->supplements){
            if(array_key_exists($id, $this->supplements)){
                $storedItem = $this->supplements[$id];
            }
        }
        $produits= $storedItem['produits'];
        $storedItem['produits'][sizeof($produits)+1] = $product_id;
        $storedItem['qty']++;
        $storedItem['price'] = $supplement->prix * $storedItem['qty'];
        $this->supplements[$id] = $storedItem;  

        $this->totalQty++;
        $this->totalPrice += $supplement->prix;
    }
}
