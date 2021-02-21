<?php

namespace App;

use App\Models\Temporada;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    protected $table = 'series';

    // Para nao adicionar os campos "updated_at" e "created_at"
    public $timestamps = false;
    protected $fillable = ['nome', 'capa'];

    public function getCapaUrlAttribute()
    {
        $capa = 'serie/sem-imagem.jpg';

        if ($this->capa) {
            $capa = $this->capa;
        }

        return Storage::url($capa);
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
