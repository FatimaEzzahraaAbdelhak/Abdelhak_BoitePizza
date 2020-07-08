<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'produits';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo('App\Models\Categories', 'category_id');
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class,'produit_id' , 'id');
    }

    public function client()
    {
        return $this->belongsToMany('App\Models\Client', 'favorites​', 'produit_id', 'client_id');
    }

    public function element()
    {
        return $this->belongsToMany('App\Models\element', 'elem_produit', 'produit_id', 'element_id');
    }

    public function supplement()
    {
        return $this->belongsToMany('App\Models\Supplement', 'supp_produit', 'produit_id', 'supplement_id');
    }

    public function formule()
    {
        return $this->belongsToMany('App\Models\Formule', 'formule_produit', 'produit_id', 'formule_id');
    }

    public function commande()
    {
        return $this->belongsToMany('App\Models\Commandes', 'commande_produit', 'produit_id', 'commande_id');
    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
