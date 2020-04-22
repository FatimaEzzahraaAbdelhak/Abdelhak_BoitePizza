<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        
        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];

        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];

        $f10 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];
        
        $f3 = [
            'name' => 'email',
            'label' => 'email',
            'type' => 'text',
        ];
        
        $f4 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'adresse',
        ];
        
        $f5 = [
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'Date debut',
        ];
        
        $f6 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'login',
        ];
        
        $f7 = [
            'name' => 'ca',
            'type' => 'text',
            'label' => 'Ca',
        ];

        $this->crud->addColumns([$f1,$f10,$f2,$f3,$f5,$f6]);
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {


        $this->crud->setValidation(ClientRequest::class);
        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '300px'
        ];

        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];

        $f3 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];

        $f4 = [
            'name' => 'email',
            'label' => 'email',
            'type' => 'text',
        ];
        $f5 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'adresse',
        ];
        $f6 = [
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'Date debut',
        ];

        $f7 = [
            'name' => 'ca',
            'type' => 'text',
            'label' => 'Ca',
        ];

        $f8 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'login',
        ];

        $f9 = [
            'name' => 'motdepasse',
            'type' => 'password',
            'label' => 'Mot de pass',
            'default'    => Str::random(8),
        ];
        
        $this->crud->addFields([$f1, $f2,$f3, $f4, $f5, $f6, $f7,$f8, $f9]);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {

        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '300px'
        ];

        $f2 = [
            'name' => 'nom',
            'type' => 'text',
            'label' => 'Nom',
        ];

        $f8 = [
            'name' => 'prenom',
            'type' => 'text',
            'label' => 'Prenom',
        ];

        $f3 = [
            'name' => 'email',
            'label' => 'email',
            'type' => 'text',
        ];
        $f4 = [
            'name' => 'adresse',
            'type' => 'text',
            'label' => 'adresse',
        ];
        $f5 = [
            'name' => 'start_date',
            'type' => 'date',
            'label' => 'Date debut',
        ];
        $f6 = [
            'name' => 'login',
            'type' => 'text',
            'label' => 'login',
        ];
        $f7 = [
            'name' => 'ca',
            'type' => 'text',
            'label' => 'Ca',
        ];

        $this->crud->addColumns([$f1, $f2,$f8,$f3, $f4, $f5, $f6, $f7]);
    }
}