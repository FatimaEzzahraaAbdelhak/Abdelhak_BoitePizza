<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use App\Http\Requests\ProduitUpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;



/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
       // $this->crud->setFromDb();
       $f1 = [
        'name' => 'nom',
        'type' => 'text',
        'label' => 'Name',
    ];
    $f2 = [
        'name' => 'prix',
        'type' => 'text',
        'label' => 'Price',
    ];
    $f3 = [
        'name' => 'isPromo',
        'type' => 'boolean',
        'label' => 'In promo',
    ];
    $f4 = [
        'name' => 'imgPath',
        'type' => 'image',
        'label' => 'Image',
        'prefix' => 'storage/',
        'height' => '80px'
    ];
    $f5 = [
        'name' => 'category.nomCat',
        'type' => 'text',
        'label' => 'Category'
    ];
   
    $this->crud->addColumns([$f1, $f2, $f3, $f4, $f5]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProduitRequest::class);
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
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];
        $f4 = [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f5 = [
            'name' => 'date_debut',
            'type' => 'date',
            'label' => 'Date debut',
        ];
        $f6 = [
            'name' => 'date_fin',
            'type' => 'date',
            'label' => 'Date in',
        ];
        $f7 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'In promo',
        ];
        $f8 = [
            'label'     => 'Category',
            'type'      => 'select2',
            'name'      => 'category_id', // the db column for the foreign key
            'entity'    => 'category',
            'attribute' => 'nomCat', // foreign key attribute that is shown to user
            // 'wrapperAttributes' => [
            //     'class' => 'form-group col-md-6'
            //   ], // extra HTML attributes for the field wrapper - mostly for resizing fields
            'tab' => 'Category',
        ];
        
        $f9 =[ // n-n relationship (with pivot table)
            'label'     => 'Element de base', // Table column heading
            'type'      => 'checklist',
            'name'      => 'element', // the method that defines the relationship in your Model
            'entity'    => 'element', // the method that defines the relationship in your Model
            'attribute' => 'nomElem', // foreign key attribute that is shown to user
            'model'     => 'App\Models\element',
            'pivot'            => true, // on create&update, do you need to add/delete pivot table entries?]
            'number_columns'   => 3, //can be 1,2,3,4,6 // foreign key model
        ];
        
        $this->crud->addFields([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8,$f9]);
        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->crud->setValidation(ProduitRequest::class);
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
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];
        $f4 = [
            'name' => 'remise',
            'type' => 'text',
            'label' => 'Remise',
        ];
        $f5 = [
            'name' => 'date_debut',
            'type' => 'date',
            'label' => 'Date debut',
        ];
        $f6 = [
            'name' => 'date_fin',
            'type' => 'date',
            'label' => 'Date in',
        ];
        $f7 = [
            'name' => 'isPromo',
            'type' => 'boolean',
            'label' => 'In promo',
        ];
        $f8 = [
            'label'     => 'Category',
            'type'      => 'select2',
            'name'      => 'category_id', // the db column for the foreign key
            'entity'    => 'category',
            'attribute' => 'nomCat', // foreign key attribute that is shown to user
            // 'wrapperAttributes' => [
            //     'class' => 'form-group col-md-6'
            //   ], // extra HTML attributes for the field wrapper - mostly for resizing fields
            'tab' => 'Category',
        ];

        $f9 =[ // n-n relationship (with pivot table)
            'label'     => 'Element de base', // Table column heading
            'type'      => 'checklist',
            'name'      => 'element', // the method that defines the relationship in your Model
            'entity'    => 'element', // the method that defines the relationship in your Model
            'attribute' => 'nomElem', // foreign key attribute that is shown to user
            'model'     => 'App\Models\element',
            'pivot'            => true, // on create&update, do you need to add/delete pivot table entries?]
            'number_columns'   => 3, //can be 1,2,3,4,6 // foreign key model
        ];
        
        $this->crud->addFields([$f1, $f2, $f3, $f4, $f5, $f6, $f7, $f8,$f9]);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }
}
