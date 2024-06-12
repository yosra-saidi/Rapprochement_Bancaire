<?php

namespace App\Http\Controllers;

use App\Models\Banque;
use Illuminate\Http\Request;

class BanqueController extends Controller
{
    public function index()
    {
        $banques = Banque::all();
        return view('banques.index', compact('banques'));
    }

    public function show($id)
    {
        $banque = Banque::findOrFail($id);
        return view('banques.show', compact('banque'));
    }
  // n'oublier pas les CRUD
}

