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
        $this->at_list = "Locais de estoque";
        $this->at_insert = "Novo local de estoque";
        $this->at_edit = "Alterar local de estoque";
        $this->description = "Especifica diferentes locais de estoque";
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string("name", 96)->comment("Local de estoque")->nullable(false);
            $table->boolean("active")->comment("Ativo")->nullable(false)->default(true);
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
        Schema::dropIfExists('locations');
    }
};
