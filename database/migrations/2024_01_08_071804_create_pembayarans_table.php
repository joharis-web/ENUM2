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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable;
            $table->unsignedBigInteger('user_id')->default(0);
            $table->integer('menu_id')->nullable;
            $table->string('table_id')->nullable;
            $table->integer('quantity')->nullable;
            $table->decimal('total', 10, 2)->nullable;
            $table->string('payment_method')->nullable;
            $table->string('payment_proof')->nullable();
            $table->string('status')->default('pending');
            
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
