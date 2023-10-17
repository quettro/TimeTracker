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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->unsignedTinyInteger('status');
            $table->timestamp('tracker')->nullable();
            $table->unsignedBigInteger('execution_time')->default(0);
            $table->foreignId('project_id')->constrained(table: 'projects')->onDelete('cascade');
            $table->foreignId('executor_id')->constrained(table: 'project_users', column: 'user_id')->onDelete('cascade');
            $table->foreignId('created_by')->constrained(table: 'users')->onDelete('cascade');
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
        Schema::dropIfExists('tasks');
    }
};
