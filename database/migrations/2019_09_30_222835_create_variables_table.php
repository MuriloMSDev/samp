<?php

use App\Enums\VariableType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('type')->nullable();
            $table->boolean('optional')->default(false);
            $table->string('default')->nullable();
            $table->unsignedBigInteger('variable_group_id');
            $table->timestamps();

            $table->foreign('variable_group_id')->references('id')
                ->on('variable_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variables');
    }
}
