<?php

namespace App\Services;

use App\Models\Facture;
use App\Models\TransactionBancaire;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class RapprochementBancaireService
{
    public function verifierPaiements()
    {
        $facturesNonPayees = Facture::where('status', 'non payée')->get();
        $transactions = TransactionBancaire::where('etat', 'non utilisée')->get();

        $result = [];

        foreach ($facturesNonPayees as $facture) {
            $montantTrouve = false;

            foreach ($transactions as $transaction) {
                // Vérifier si la transaction bancaire correspond à une seule facture
                if ($transaction->payeur == $facture->client_id && $transaction->montant == $facture->montant) {
                    $facture->status = 'payée';
                    $facture->save();
                    $transaction->etat = 'utilisée';
                    $transaction->save();
                    $montantTrouve = true;
                    break;
                }

                // Vérifier si la transaction bancaire correspond à la somme de plusieurs factures
                $facturesDansPeriode = Facture::where('client_id', $transaction->payeur)
                    ->where('status', 'non payée')
                    ->where('date', '>=', Carbon::parse($transaction->date_transaction)->subDays(10))
                    ->where('date', '<=', $transaction->date_transaction)
                    ->get();

                $combinations = $this->generateCombinations($facturesDansPeriode);

                foreach ($combinations as $combination) {
                    $sum = $combination->sum('montant');
                    if ($sum == $transaction->montant) {
                        foreach ($combination as $f) {
                            $f->status = 'payée';
                            $f->save();
                        }
                        $transaction->etat = 'utilisée';
                        $transaction->save();
                        $montantTrouve = true;
                        break 2; // Sortir des deux boucles foreach
                    }
                }
            }

            if (!$montantTrouve) {
                $result[] = $facture;
            }
        }

        // Filtrer les factures non payées pour ne retourner que celles qui restent non payées
        $resultNonPayees = Facture::where('status', 'non payée')->get();

        if ($resultNonPayees->isEmpty()) {
            return 'Succès: Toutes les factures sont payées';
        } else {
            return $resultNonPayees;
        }
    }

    private function generateCombinations($items)
    {
        $result = collect([collect([])]); // Initialisation avec une collection vide
     
        foreach ($items as $item) {
            $newCombinations = collect([]);
     
            foreach ($result as $combination) {
                $newCombinations->push($combination->merge([$item])); // Utilisation de merge pour ajouter un item à une collection
            }
     
            $result = $result->merge($newCombinations);
        }
     
        return $result->filter(function ($combination) {
            return !$combination->isEmpty(); // Filtrer les combinaisons vides
        });
    }
    
}
// namespace App\Services;

// use App\Models\Facture;
// use App\Models\TransactionBancaire;
// use Carbon\Carbon;
// use Illuminate\Support\Collection;

// class RapprochementBancaireService
// {
//     public function verifierPaiements()
//     {
//         $facturesNonPayees = Facture::where('status', 'non payée')->get();
//         $transactions = TransactionBancaire::all();

//         $result = [];

//         foreach ($facturesNonPayees as $facture) {
//             $montantTrouve = false;

//             foreach ($transactions as $transaction) {
//                 // Vérifier si la transaction bancaire correspond à une seule facture
//                 if ($transaction->payeur == $facture->client_id && $transaction->montant == $facture->montant && $transaction->date_transaction == $facture->date) {
//                     $facture->status = 'payée';
//                     $facture->save();
//                     $montantTrouve = true;
//                     break;
//                 }

//                 // Vérifier si la transaction bancaire correspond à la somme de plusieurs factures
//                 $facturesDansPeriode = Facture::where('client_id', $transaction->payeur)
//                     ->where('status', 'non payée')
//                     ->where('date', '>=', Carbon::parse($transaction->date_transaction)->subDays(10))
//                     ->where('date', '<=', $transaction->date_transaction)
//                     ->get();

//                 $combinations = $this->generateCombinations($facturesDansPeriode);

//                 foreach ($combinations as $combination) {
//                     $sum = $combination->sum('montant');
//                     if ($sum == $transaction->montant) {
//                         foreach ($combination as $f) {
//                             $f->status = 'payée';
//                             $f->save();
//                         }
//                         $montantTrouve = true;
//                         break 2; // Sortir des deux boucles foreach
//                     }
//                 }
//             }

//             if (!$montantTrouve) {
//                 $result[] = $facture;
//             }
//         }

//         // Filtrer les factures non payées pour ne retourner que celles qui restent non payées
//         $resultNonPayees = Facture::where('status', 'non payée')->get();

//         if ($resultNonPayees->isEmpty()) {
//             return 'Succès: Toutes les factures sont payées';
//         } else {
//             return $resultNonPayees;
//         }
//     }

//     private function generateCombinations($items)
//     {
//         $result = collect([collect([])]); // Initialisation avec une collection vide

//         foreach ($items as $item) {
//             $newCombinations = collect([]);

//             foreach ($result as $combination) {
//                 $newCombinations->push($combination->merge([$item])); // Utilisation de merge pour ajouter un item à une collection
//             }

//             $result = $result->merge($newCombinations);
//         }

//         return $result->filter(function ($combination) {
//             return !$combination->isEmpty(); // Filtrer les combinaisons vides
//         });
//     }
// }

