<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUtilizador extends Model
{
    use HasFactory;

    protected $table = 'tipo_utilizadores';

    protected $fillable = [
        'nome',
        'role',
        'pode_visualizar',
        'pode_criar',
        'pode_editar',
        'pode_apagar',
        'descricao',
        'estado',
    ];

    protected $casts = [
        'pode_visualizar' => 'boolean',
        'pode_criar' => 'boolean',
        'pode_editar' => 'boolean',
        'pode_apagar' => 'boolean',
    ];

    /**
     * Relacionamento com utilizadores
     */


    public function utilizadores()
    {
        return $this->hasMany(User::class, 'tipo_user');
    }


    /**
     * Verificar se o tipo tem permissão para visualizar
     */
    public function podeVisualizar()
    {
        return $this->pode_visualizar;
    }

    /**
     * Verificar se o tipo tem permissão para criar
     */
    public function podeCriar()
    {
        return $this->pode_criar;
    }

    /**
     * Verificar se o tipo tem permissão para editar
     */
    public function podeEditar()
    {
        return $this->pode_editar;
    }

    /**
     * Verificar se o tipo tem permissão para apagar
     */
    public function podeApagar()
    {
        return $this->pode_apagar;
    }
}
