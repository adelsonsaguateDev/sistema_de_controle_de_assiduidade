<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTipoUtilizadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_utilizadores', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('role');
            $table->boolean('pode_visualizar')->default(true);
            $table->boolean('pode_criar')->default(false);
            $table->boolean('pode_editar')->default(false);
            $table->boolean('pode_apagar')->default(false);
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('estado')->default(1);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Inserir tipos padrão
        DB::table('tipo_utilizadores')->insert([
            [
                'nome' => 'Administrador',
                'role' => 'admin',
                'pode_visualizar' => true,
                'pode_criar' => true,
                'pode_editar' => true,
                'pode_apagar' => true,
                'descricao' => 'Acesso total ao sistema',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Editor',
                'role' => 'editor',
                'pode_visualizar' => true,
                'pode_criar' => true,
                'pode_editar' => true,
                'pode_apagar' => false,
                'descricao' => 'Pode criar e editar, mas não apagar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Visualizador',
                'role' => 'viewer',
                'pode_visualizar' => true,
                'pode_criar' => false,
                'pode_editar' => false,
                'pode_apagar' => false,
                'descricao' => 'Acesso somente para visualização',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_utilizadores');
    }
}
