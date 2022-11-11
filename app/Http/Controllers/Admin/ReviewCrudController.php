<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ReviewRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ReviewCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReviewCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    private function getFieldsData($show = FALSE)
    {

        return [
            [  
                'label'     => "Reviewed By",
                'type'      => 'select',
                'name'      => 'reviewer', // the method that defines the relationship in your Model
                // optional
                'entity'    => 'reviewer', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'email', // foreign key attribute that is shown to user
            ],
            [  
                'label'     => "Service provider",
                'type'      => 'select',
                'name'      => 'provider', // the method that defines the relationship in your Model
                // optional
                'entity'    => 'provider', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'email', // foreign key attribute that is shown to user
            ],
           
           
        ];
    }



    public function setup()
    {
        CRUD::setModel(\App\Models\Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/review');
        CRUD::setEntityNameStrings('review', 'reviews');
        $this->crud->denyAccess('create');

    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('profile_id');
        $this->crud->addColumns($this->getFieldsData(TRUE));
        CRUD::column('star_rate');
        CRUD::column('review');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ReviewRequest::class);

        CRUD::field('star_rate');
        CRUD::field('review');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
