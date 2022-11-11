<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProjectCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProjectCrudController extends CrudController
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
                'label'     => "Provider",
                'type'      => 'select',
                'name'      => 'provider', // the method that defines the relationship in your Model
                // optional
                'entity'    => 'provider', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'email', // foreign key attribute that is shown to user
            ],
            [    // Select2Multiple = n-n relationship (with pivot table)
                'label'     => "Consumer",
                'type'      => 'select',
                'name'      => 'consumer', // the method that defines the relationship in your Model
                // optional

                'entity'    => 'consumer', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'email', // foreign key attribute that is shown to user
                'pivot'     => true, // on create&update, do you need to add/delete pivot table entries?
            ]
        ];
    }



    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Project::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/project');
        CRUD::setEntityNameStrings('project', 'projects');
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
        CRUD::column('id');
        CRUD::column('transaction_id');
        $this->crud->addColumns($this->getFieldsData(TRUE));
        CRUD::column('description');
        CRUD::column('status');
        CRUD::column('hours');
        CRUD::column('amount');
        CRUD::column('started_at');
        CRUD::column('completed_at');
        CRUD::column('rejected_at');

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
        CRUD::setValidation(ProjectRequest::class);

        CRUD::field('transaction_id');
        CRUD::field('description');
        CRUD::field('status');
        CRUD::field('hours');
        CRUD::field('amount');
        CRUD::field('started_at');
        CRUD::field('completed_at');
        CRUD::field('rejected_at');

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
