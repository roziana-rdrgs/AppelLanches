<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'senha', 'saldo'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'senha',
    ];

    protected $appends = ['links'];

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/pessoas/' . $this->id,
        ];
    }

    public function operacoes()
    {
        return $this->hasMany(Operacao::class);
    }
}
