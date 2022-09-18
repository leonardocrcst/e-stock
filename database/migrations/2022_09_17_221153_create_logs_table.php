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
        $this->at_list = "Log do sistema";
        $this->description = "Ações dos usuários";
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("user_id")->comment("Usuário")->nullable(false);
            $table->string("action", 256)->comment("Ação realizada")->nullable(false);
            $table->comment($this->getComment());
            $table->foreign("user_id")->on("users")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
