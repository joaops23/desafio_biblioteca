<?php 

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Obras extends Migration
{
    public function up()
    {
        Schema::create('obras', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('titulo', 80);
            $table->string('editora', 80);
            $table->string('foto', 80);
            $table->string('autores', 80);
        });
    }

    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}

?>