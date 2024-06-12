<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SocieteController extends Controller
{
    public function index():View
    {
       
        $societes = Societe::all();
        return view('societes.index', compact('societes'));
    }

    public function show($id)
    {
        $societe = Societe::findOrFail($id);
        return view('societes.show', compact('societe'));
    }
    //CRUD
}

