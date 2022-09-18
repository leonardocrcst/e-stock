<?php

use App\Http\Traits\TableCommentToJson;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    use TableCommentToJson;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->at_list = "Movimentação do estoque";
        $this->at_insert = "Nova movimentação";
        $this->at_edit = "Alterar movimentação";
        $this->description = "Registro das movimentações no estoque";
        Schema::create('moviments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id")->comment("Usuário")->nullable(false);
            $table->unsignedBigInteger("product_id")->comment("Produto")->nullable(false);
            $table->unsignedBigInteger("location_id")->comment("Estoque")->nullable(false);
            $table->unsignedBigInteger("measure_id")->comment("Un.")->nullable(false);
            $table->integer("quantity", false, true)->comment("Quantidade")->nullable(false);
            $table->enum("direction", ["Entrada", "Saída", "Transferência"])->comment("Direção")->nullable(false);
            $table->text("comments")->comment("Observações")->nullable(true);
            $table->comment($this->getComment());
            $table->foreign("user_id")->on("users")->references("id");
            $table->foreign("product_id")->on("products")->references("id");
            $table->foreign("location_id")->on("locations")->references("id");
            $table->foreign("measure_id")->on("measure_units")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moviments');
    }
};
