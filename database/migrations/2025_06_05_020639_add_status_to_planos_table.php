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
        Schema::table('planos', function (Blueprint $table) {
            $table->string('status')->default('ativo')->after('preco'); // ou outro campo que já exista
        });
    }
    
    public function down(): void
    {
        Schema::table('planos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
};
