<?php
use App\Arrival\Models\Arrival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

Route::prefix('api/v1')->group(function()
{
    Route::get('arrivals', function ()
    {
        return Arrival::all();
    });

    Route::post('arrivals', function (Request $request)
    {
        $arrival = new Arrival();
        $arrival->name = $request->name;
        $arrival->save();

        Event::fire('app.event.eventHook');

        return response()->json('Succeed!');
    });
});     
?>