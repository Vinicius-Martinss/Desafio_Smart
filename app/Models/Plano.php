<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Jetstream\Team;

class Plano extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'velocidade',
        'preco',
        'descricao',
        'user_id',
        'status',
        'team_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
