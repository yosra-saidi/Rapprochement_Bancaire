<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $table = 'entreprise'; 

    protected $fillable = [
        'nom', 'adresse', 'email', 'telephone'
        
    ];

    // Relation avec les clients de l'entreprise
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    // Relation avec les factures via les clients
    public function factures()
    {
        return $this->hasManyThrough(Facture::class, Client::class);
    }
}