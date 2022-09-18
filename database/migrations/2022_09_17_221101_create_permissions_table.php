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
        $this->at_list = "Permissões das contas";
        $this->at_insert = "Nova permissão";
        $this->at_edit = "Alterar permissão";
        $this->description = "Tabela de permissões das contas do sistema";
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("account_id");
            $table->unsignedBigInteger("route_id")->comment("Recurso")->nullable(false);
            $table->boolean("select")->comment("Permite acessar")->default(true);
            $table->boolean("insert")->comment("Permite inserir")->default(false);
            $table->boolean("update")->comment("Permite alterar")->default(false);
            $table->boolean("delete")->comment("Permite excluir")->default(false);
            $table->comment($this->getComment());
            $table->foreign("account_id")->on("accounts")->references("id");
            $table->foreign("route_id")->on("routes")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
