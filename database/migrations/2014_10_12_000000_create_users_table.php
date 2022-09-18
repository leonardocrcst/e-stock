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
        $this->description = "Usuários cadastrados";
        $this->at_list = "Usuários";
        $this->at_insert = "Novo usuário";
        $this->at_edit = "Alterar usuário";
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->comment("Nome")->nullable(false);
            $table->string('email')->unique()->comment("E-mail")->nullable(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment("Senha");
            $table->rememberToken();
            $table->unsignedBigInteger("account_id")->comment("Conta de acesso")->nullable(false);
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
        Schema::dropIfExists('users');
    }
};
