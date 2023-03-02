<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tecnology', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')
            ->references('id')
            ->on('projects')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->unsignedBigInteger('tecnology_id');
            $table->foreign('tecnology_id')
            ->references('id')
            ->on('tecnologies')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->primary(['project_id','tecnology_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_tecnology');
    }
};
