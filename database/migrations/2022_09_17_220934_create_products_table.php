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
        $this->description = "Registro de produtos";
        $this->at_list = "Produtos cadastrados";
        $this->at_insert = "Novo produto";
        $this->at_edit = "Alterar produto";
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string("name", 256)->comment("Nome")->nullable(false);
            $table->decimal("value", 12, 2)->comment("Valor")->nullable(false);
            $table->integer("min_stock")->comment("Estoque mínimo")->nullable(false);
            $table->unsignedBigInteger("measure_id")->comment("Unid. medida")->nullable(false);
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
        Schema::dropIfExists('products');
    }
};
