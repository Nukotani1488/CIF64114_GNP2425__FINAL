<?php

use App\Models\User;
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
        Schema::create('userdata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uid')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->string('full_name')->nullable();
            $table->boolean('sex')->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->date('birth_date')->nullable();
            $table->decimal('max_sugar')->nullable();
            $table->string('plan')->nullable();
            $table->boolean('registered')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userdata');
    }
};
