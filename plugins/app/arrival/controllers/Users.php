<?php namespace App\Arrival\Controllers;

use Backend\Classes\Controller;
use Illuminate\Http\Request;
use App\Arrival\Models\Arrival;


class Users extends Controller
{
    public function store(Request $request)
    {
        $user = new Arrival();
        $user->name = $request->name;
        $user->save();

        return response()->json('Succeed!');
    }
}



?>