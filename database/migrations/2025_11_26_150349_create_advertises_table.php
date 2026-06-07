<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('redirect_link');
            $table->date('expire_date');
            $table->string('company_name');
            $table->string('contact');
            $table->enum('ad_position', ['header', 'pages', 'popup']);
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertises');
    }
};
