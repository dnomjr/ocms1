<? use App\Arrival\Models\Arrival;

Route::get('api', function () {
    return Arrival::get();
});

Route::post('users', 'App\Arrival\Controllers\Users@store');

?>