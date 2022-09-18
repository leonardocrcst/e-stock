<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use \App\Http\Traits\TableCommentToJson;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->description = "Unidades de medida disponíveis para quantificação dos produtos";
        $this->at_list = "Unidades de medida";
        $this->at_insert = "Nova unidade de medida";
        $this->at_edit = "Alterar unidade de medida";
        Schema::create('measure_units', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string("name", 96)->comment("Unidade de medida")->nullable(false);
            $table->string("initials", 8)->comment("Sigla")->nullable(false);
            $table->comment($this->getComment());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measure_units');
    }
};
