<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('command');
            $table->string('expression')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('dont_overlap')->default(false);
            $table->boolean('run_in_maintenance')->default(false);
            $table->string('notifications_email')->nullable();
            $table->time('timestamps')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
