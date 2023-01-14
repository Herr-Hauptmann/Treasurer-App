<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('project');
            $table->string('person');
            $table->string('reciept_number');
            $table->date('reciept_date');
            $table->float('cost');
            $table->string('bank_account_number');
            $table->string('comment');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
};
