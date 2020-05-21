<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operacao extends Model
{
    use SoftDeletes;
    private $table= 'operacoes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'pessoa_id', 'valor', 'data_operacao', 'historico', 'flag_tipo'
    ];

    protected $appends = ['pessoa', 'links'];

    public function getLinksAttribute()
    {
    return [
        'self' => '/api/operacoes/' . $this->id,
        'pessoa' => '/api/pessoas/' . $this->pessoa_id,
    ];
    }

    public function getPessoaAttribute()
    {
        return $this->pessoa()->get();
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
    }
}


?>
