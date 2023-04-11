<? 
use App\Arrival\Models\Arrival;
use Illuminate\Http\Request;

Route::get('api', function () {
    return Arrival::get();
});

Route::post('users', function (Request $request)
{
    $user = new Arrival();
    $user->name = $request->name;
    $user->save();

    return response()->json('Succeed!');
});



?>