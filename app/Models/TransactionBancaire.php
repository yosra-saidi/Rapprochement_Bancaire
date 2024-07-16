<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionBancaire extends Model
{
    use HasFactory;
    protected $table = 'transactions_bancaires'; 
    protected $fillable = ['payeur', 'montant', 'date_transaction','etat'];

    protected $dates = ['date_transaction'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'payeur', 'id');
    }
}