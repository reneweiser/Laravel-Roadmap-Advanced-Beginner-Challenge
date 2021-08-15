<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('deadline');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->nullOnDelete();

            $table->foreign('status_id')
                ->references('id')
                ->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('status');
    }
}
