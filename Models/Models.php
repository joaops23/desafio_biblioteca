<?php 

namespace Models\User;

use Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\DB;

class User extends Model{
    
    protected $table = 'obras';

    protected $guarded = ['id', 'titulo', 'editora', 'foto', 'autores'];

    public static function gravar($data) 
    {
        $banco = new User;
        $banco->titulo = $data['titulo'];
        $banco->editora = $data['editora'];
        $banco->foto = $data['foto'];
        $banco->autores = $data['autores'];
        $banco->save();
    }

}