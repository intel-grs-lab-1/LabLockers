# LabLockers Doc

## Add a item

Make a table:

```console
php artisan make:migration create_tableName_table
```

Make a model:

```console
php artisan make:model modelName
```

Go to app/Http/Controllers/HomeController.php

add use import

```php
use App\modelName;
```

add functions:

```php
public function addmodelName(){
        $data['title'] = "Add Admin user";
        $data['route'] = "post-modelName";

        return view('Laptops.insertCsvdata', $data);
    }

    public function postmodelName(Request $request){
         $this->validate($request,[
            'name' => 'required|string',
     
        ]);

        $acc['name'] = $request->name;

        Touchscreen::create($acc);
        session()->flash('message', 'modelName types Successfully added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }
```

Web:

```php
Route::get('add-modelName', 'HomeController@addmodelName')->name('add-modelName');
Route::post('post-modelName', 'HomeController@postmodelName')->name('post-modelName');
```

