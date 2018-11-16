<?php

Route::get('/', function () {
    return "Hello";
});

Route::get('companies', 'CompaniesController@index');
// Other company routes?
Route::delete('companies/{id}', 'CompaniesController@destroy');

Route::get('companies_vue/{id}', function ($id) {
    return view('companies.show-vue', compact('id'));
});
