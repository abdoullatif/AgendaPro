<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Creneau;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreneauController extends Controller
{
    //
    public function index()
    {
        return Creneau::All();
    }

    public function show($id)
    {
        return Creneau::find($id);
    }

    public function store(Request $request)
    {
        return Creneau::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $creneau = Creneau::findOrFail($id);
        $creneau->update($request->all());

        return $creneau;
    }

    public function delete(Request $request, $id)
    {
        $creneau = Creneau::findOrFail($id);
        $creneau->delete();

        return 204;
    }
}
