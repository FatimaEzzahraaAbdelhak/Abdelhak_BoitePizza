<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
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
        $this->crud->addField([
            'label' => "ImgPath",
            'name' => "imgPath",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1, ]);
            CRUD::addField([  // Select2
                'label'     => 'Category',
                'type'      => 'select2',
                'name'      => 'category_id', // the db column for the foreign key
                'entity'    => 'category', // the method that defines the relationship in your Model
                'attribute' => 'nomCat', // foreign key attribute that is shown to user
                // 'wrapperAttributes' => [
                //     'class' => 'form-group col-md-6'
                //   ], // extra HTML attributes for the field wrapper - mostly for resizing fields
            ]);
            
        $this->crud->setValidation(ProduitRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();

       
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
