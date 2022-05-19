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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone')->nullable();
            $table-> unsignedBigInteger('company_id')->nullable();
            
            // $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');


            
            $table->timestamps();
            // $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            // $table->foreignId('company_id')->nullable()->constrained('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
