<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class FactureImport //implements ToCollection
{
    public function collection(Collection $collection)
    {
        // Logique pour traiter chaque ligne du fichier Excel
        foreach ($collection as $row) {
            // Traitement des données de la ligne
        }
    }
}
