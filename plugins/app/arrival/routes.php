<?php
use App\Arrival\Models\Arrival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

Route::prefix('api/v1')->group(function()
{
    // API ktore vrati vsetky prichody
    Route::get('arrivals', function ()
    {
        return Arrival::all();
    });
    
    // API cez ktore sa zapisu nove prichody
    Route::post('arrivals', function (Request $request)
    {
        $arrival = new Arrival();
        $arrival->name = $request->post('name');
        $arrival->arrival = now();
        $arrival->save();

        return response()->json('Succeed!');
    });
});     
?>