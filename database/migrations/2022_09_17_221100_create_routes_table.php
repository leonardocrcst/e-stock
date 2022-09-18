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
        $this->description = "Define os recursos disponíveis";
        $this->at_insert = "Novo recurso";
        $this->at_edit = "Alterar recurso";
        $this->at_list = "Recursos";
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name")->comment("Recurso")->nullable(false);
            $table->string("url")->comment("URL")->nullable(false);
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
        Schema::dropIfExists('routes');
    }
};
