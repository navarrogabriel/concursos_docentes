<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Crud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('areas' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('asignaturas' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('cargosconcursados' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('carreras' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('categorias' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('concursos' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('concursosjurados' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('concursospostulantes' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('institutos' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('jurados' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('llamados' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('llamadosconcursos' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('logs' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('perfiles' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});

Schema::table('postulantes' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});
Schema::table('requisitos' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('requisitositems' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});

Schema::table('requisitospostulantes' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('universidades' , function( Blueprint $table ){


$table->timestamps();


$table->timestamp('deleted_at')->nullable();


});
Schema::table('users' , function( Blueprint $table ){

$table->timestamps();

$table->timestamp('deleted_at')->nullable();

});


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
