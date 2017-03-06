<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ResponsableRequest as StoreRequest;
use App\Http\Requests\ResponsableRequest as UpdateRequest;

class ResponsableCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Responsable");
        $this->crud->setRoute("admin/responsable");
        $this->crud->setEntityNameStrings('responsable', 'responsables');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

        $this->crud->setFromDb();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');
        //$this->crud->addField($options, 'update/create/both');

        $this->crud->addField( ['name' => 'apellidopaterno', 'label' => "Apellido Paterno"], 'update/create/both');
        $this->crud->addField( ['name' => 'apellidomaterno', 'label' => "Apellido Materno"], 'update/create/both');
        $this->crud->addField( ['name' => 'clavedeelector', 'label' => "Clave de elector"], 'update/create/both');
        $this->crud->addField( ['name' => 'email', 'label' => "e-Mail", 'type' => 'email'], 'update/create/both');

        $this->crud->addField(
            [  // Select2
               'label' => "Municipio",
               'type' => 'select2',
               'name' => 'municipio_id', // the db column for the foreign key
               'entity' => 'municipio', // the method that defines the relationship in your Model
               'attribute' => 'municipio', // foreign key attribute that is shown to user
               'model' => "App\Models\Municipio" // foreign key model
            ]

            , 'update/create/both');

          $this->crud->addField(
            [  // Select2
               'label' => "Nombramiento",
               'type' => 'select2',
               'name' => 'nombramiento_id', // the db column for the foreign key
               'entity' => 'nombramiento', // the method that defines the relationship in your Model
               'attribute' => 'nombramiento', // foreign key attribute that is shown to user
               'model' => "App\Models\Nombramiento" // foreign key model
            ]

            , 'update/create/both');

          $this->crud->addField(
            [  // Select2
               'label' => "Región",
               'type' => 'select2',
               'name' => 'region_id', // the db column for the foreign key
               'entity' => 'region', // the method that defines the relationship in your Model
               'attribute' => 'region', // foreign key attribute that is shown to user
               'model' => "App\Models\Region", // foreign key model
                'placeholder' => "Click para seleccionar"
            ]

            , 'update/create/both');
       

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

         $this->crud->setColumnDetails('region', ['label' => 'Región']); // adjusts the properties of the passed in column (by name)
         $this->crud->setColumnDetails('apellidopaterno', ['label' => 'Apellido Paterno']);
         $this->crud->setColumnDetails('apellidomaterno', ['label' => 'Apellido Materno']);
         $this->crud->setColumnDetails('clavedeelector', ['label' => 'Clave de elector']);
         
         $this->crud->setColumnDetails('municipio_id', [
             // 1-n relationship
           'label' => "Municipio", // Table column heading
           'type' => "select",
           'name' => 'municipio_id', // the column that contains the ID of that connected entity;
           'entity' => 'municipio', // the method that defines the relationship in your Model
           'attribute' => "municipio", // foreign key attribute that is shown to user
           'model' => "App\Models\Municipio" // foreign key model
         ]);
         

         $this->crud->setColumnDetails('nombramiento_id', [
             // 1-n relationship
           'label' => "Nombramiento", // Table column heading
           'type' => "select",
           'name' => 'nombramiento_id', // the column that contains the ID of that connected entity;
           'entity' => 'nombramiento', // the method that defines the relationship in your Model
           'attribute' => "nombramiento", // foreign key attribute that is shown to user
           'model' => "App\Models\Nombramiento" // foreign key model
         ]);
         
          $this->crud->setColumnDetails('region_id', [
             // 1-n relationship
           'label' => "Región", // Table column heading
           'type' => "select",
           'name' => 'region_id', // the column that contains the ID of that connected entity;
           'entity' => 'region', // the method that defines the relationship in your Model
           'attribute' => "region", // foreign key attribute that is shown to user
           'model' => "App\Models\Region" // foreign key model
         ]);
                  
        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
         $this->crud->enableDetailsRow();
         $this->crud->allowAccess('details_row');
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        //$this->crud->enableAjaxTable();

        //------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
         $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();

    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}
}
