# laravel-in-xserver-with-remote-container

This is Xserver (not official) Development in RemoteContainer.

## How To Add CRUD API

1. Make Model

    ```sh
    $ php artisan make:model MODEL -mcr
    ```

1. Add Column Name Const to Model

    ```php
    const HOGE = 'hoge';
    const FUGA = 'fuga';
    ```

1. Add Column to Migration

    ```php
    $table->string(MODEL::HOGE);
    $table->string(MODEL::FUGA);
    ```

1. Migrate Table

    ```sh
    $ php artisan migrate
    ```

1. Fix Controller

    ```php
    public function index()
    {
        return MODEL::all()->toArray();
    }

    // public function create()
    // {
    //     //
    // }

    public function store(Request $request)
    {
        $model = new MODEL();

        $model[MODEL::HOGE] = $request->input(MODEL::HOGE);
        $model[MODEL::FUGA] = $request->input(MODEL::FUGA);

        $model->save();
    }

    public function show(int $id)
    {
        return $model = MODEL::find($id);
    }

    // public function edit(MODEL $model)
    // {
    //     //
    // }

    public function update(Request $request, int $id)
    {
        $model = MODEL::find($id);

        $model[MODEL::HOGE] = $request->input(MODEL::HOGE);
        $model[MODEL::FUGA] = $request->input(MODEL::FUGA);
        $model[MODEL::COLUMN3] = $request->input(MODEL::COLUMN3);

        $model->save();
    }

    public function destroy(int $id)
    {
        MODEL::find($id)->delete();
    }
    ```

1. Add Routing to route

    ```php
    use App\Http\Controllers\MODELController;

    Route::resource('sample', MODELController::class, ['except' => ['create', 'edit']]);
    ```

### Check API

- To Command

    ```sh
    $ php artisan route:list
    ```

- To REST Client

    ```
    GET http://localhost/api/sample

    ###

    POST http://localhost/api/sample
    Content-Type: application/json

    {
        "hoge": "Hoge",
        "fuga": "Fuga"
    }

    ###

    GET http://localhost/api/sample/1

    ###

    PUT http://localhost/api/sample/1
    Content-Type: application/json

    {
        "hoge": "Hoge_",
        "fuga": "Fuga"
    }

    ###

    DELETE http://localhost/api/sample/1
    ```
