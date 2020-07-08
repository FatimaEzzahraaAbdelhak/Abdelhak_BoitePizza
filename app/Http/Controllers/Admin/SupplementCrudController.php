<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupplementRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SupplementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SupplementCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Supplement');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/supplement');
        $this->crud->setEntityNameStrings('supplement', 'supplements');
    }

    protected function setupListOperation()
    {
        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => '80px'
        ];

        $f2 = [
            'name' => 'nomIngr',
            'type' => 'text',
            'label' => 'Nom Ingr',
        ];
        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];

        $this->crud->addColumns([$f1, $f2, $f3]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(SupplementRequest::class);

        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '300px'
        ];

        $f2 = [
            'name' => 'nomIngr',
            'type' => 'text',
            'label' => 'Nom Ingr',
        ];
        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];
        
        
        $this->crud->addFields([$f1, $f2, $f3]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
