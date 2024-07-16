<?php
// namespace App\Http\Controllers;

// use App\Services\RapprochementBancaireService;

// class RapprochementBancaireController extends Controller
// {
//     protected $rapprochementService;

//     public function __construct(RapprochementBancaireService $rapprochementService)
//     {
//         $this->rapprochementService = $rapprochementService;
//     }

//     public function verifier()
//     {
//         return $this->rapprochementService->verifierPaiements();
//     }

// }
namespace App\Http\Controllers;

use App\Services\RapprochementBancaireService;
use Illuminate\Http\Request;

class RapprochementBancaireController extends Controller
{
    protected $rapprochementService;

    public function __construct(RapprochementBancaireService $rapprochementService)
    {
        $this->rapprochementService = $rapprochementService;
    }

    public function index()
    {
        return view('rapprochement.index');
    }

    // public function run(Request $request)
    // {
    //     $result = $this->rapprochementService->verifierPaiements();

    //     if (is_string($result) && $result === 'Succès: Toutes les factures sont payées') {
    //         return response()->json(['success' => true]);
    //     } else {
    //         return response()->json(['success' => false, 'factures' => $result]);
    //     }
    // }
    public function run(Request $request)
{
    $result = $this->rapprochementService->verifierPaiements();

    if (is_string($result) && $result === 'Succès: Toutes les factures sont payées') {
        return response()->json(['success' => true]);
    } else {
        // Transform the result to include necessary details
        $factures = $result->map(function ($facture) {
            return [
                'id' => $facture->id,
                'client_id' => $facture->client_id,
                'montant' => $facture->montant,
                'date' => $facture->date,
                'status' => $facture->status,
            ];
        });
        return response()->json(['success' => false, 'factures' => $factures]);
    }
}

}

