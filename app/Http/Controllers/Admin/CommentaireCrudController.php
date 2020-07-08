<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentaireRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentaireCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commentaire');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commentaire');
        $this->crud->setEntityNameStrings('commentaire', 'commentaires');
        //$this->crud->denyAccess(['create','update']);
    }

    protected function setupListOperation()
    {
        $f1 = [
            'name' => 'id',
            'type' => 'text',
            'label' => 'Id',
        ];

        $f2 = [
            'name' => 'texte',
            'type' => 'text',
            'label' => 'texte',
        ];

        $f3 = [
            'name' => 'date_pub',
            'type' => 'datetime',
            'label' => 'date_pub',
        ];

        $f4 = [
            'name' => 'produit.nom',
            'label' => 'Produit',
            'type' => 'text',
        ];
        $f5 = [
            'name' => 'client.nom',
            'label' => 'Client',
            'type' => 'text',
        ];

        $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommentaireRequest::class);

        $f2 = [
            'name' => 'texte',
            'label' => 'texte',
            'type' => 'ckeditor',
            'placeholder' => 'Your textarea text here',
        ];


        $f4 = [
            'name' => 'produit_id',
            'label' => 'Produit',
            'type' => 'select2',
            'entity'    => 'produit',
            'attribute' => 'nom',
        ];
        $f5 = [
            'name' => 'client_id',
            'label' => 'Client',
            'type' => 'select2',
            'entity'    => 'client',
            'attribute' => 'nom',
        ];


        $this->crud->addFields([ $f2, $f4 , $f5]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
