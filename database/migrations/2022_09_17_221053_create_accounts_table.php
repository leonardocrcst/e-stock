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
        $this->at_list = "Contas de usuário";
        $this->at_edit = "Alterar conta";
        $this->at_insert = "Nova conta";
        $this->description = "Define as contas dos usuários e respectivas autorizações";
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string("name", 96)->comment("Conta")->nullable(false);
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
        Schema::dropIfExists('accounts');
    }
};
