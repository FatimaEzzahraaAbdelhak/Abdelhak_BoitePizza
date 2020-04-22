<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use App\Http\Requests\FormuleUpdateRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
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
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'nomFormule',
        ];
        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];

        $f5 = [
            'name' => 'id',
            'type' => 'text',
            'label' => 'Id',
        ];


        $this->crud->addColumns([$f5, $f1, $f2, $f3]);
    }

    protected function setupCreateOperation()
    {
        /* $this->crud->addField([
            'label' => "ImgPath",
            'name' => "imgPath",
            'type' => 'image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1,
        ]);

        CRUD::addField([  // Select2
            'label'     => 'Category',
            'type'      => 'select2',
            'name'      => 'category_id', // the db column for the foreign key
            'entity'    => 'category', // the method that defines the relationship in your Model
            'attribute' => 'nomCategorie', // foreign key attribute that is shown to user
            // 'wrapperAttributes' => [
            //     'class' => 'form-group col-md-6'
            //   ], // extra HTML attributes for the field wrapper - mostly for resizing fields
            'tab' => 'Category',
        ]); */

        $this->crud->setValidation(FormuleRequest::class);
        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];


        $f2 = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Nom Formule',
        ];
        
        $f4 = [
            'name' => 'description',
            'label' => 'Text',
            'type' => 'ckeditor',
            'placeholder' => 'text ici ...',
        ];

        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];
        
        $this->crud->addFields([$f1, $f2, $f3, $f4]);
        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }



    protected function setupUpdateOperation()
    {
        
        $this->crud->setValidation(FormuleRequest::class);
        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];

        $f2 = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'Nom Formule',
        ];
        
        $f4 = [
            'name' => 'description',
            'label' => 'Text',
            'type' => 'ckeditor',
            'placeholder' => ' text ici',
        ];

        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];     
        $this->crud->addFields([$f1, $f2, $f3, $f4]);

        // TODO: remove setFromDb() and manually define Fields
        //$this->crud->setFromDb();
    }

    protected function setupShowOperation()
    {

        $this->crud->set('show.setFromDb', false);

        $f1 = [
            'name' => 'imgPath',
            'type' => 'image',
            'label' => 'Image',
            'prefix' => 'storage/',
            'height' => '80px'
        ];

        $f5 = [
            'name' => 'id',
            'type' => 'text',
            'label' => 'Id',
        ];

        $f2 = [
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => 'nomFormule',
        ];

        $f4 = [
            'name' => 'description',
            'label' => 'Text',
            'type' => 'ckeditor',
            'placeholder' => ' text ici',
        ];
        
        $f3 = [
            'name' => 'prix',
            'label' => 'Prix',
            'type' => 'text',
        ];

        $this->crud->addColumns([$f1,$f5, $f2, $f3, $f4]);
    }
}
