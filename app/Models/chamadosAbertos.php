<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chamadosAbertos extends Model
{
    
    protected $table = 'CHAMADOS_ABERTOS';

    protected $primaryKey = 'ID_CHAMADO_ABERTO';

    protected $fillable = [
           'ASSUNTO' ,
           'SOLICITANTE',
           'COMENTARIO'



    ];
    public $timestamps = false;
}
