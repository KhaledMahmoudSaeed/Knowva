<?php

use App\Models\Lang;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('speaks', function (Blueprint $table) {
            $table->id();
            $table->string("title")->unique();
            $table->string("content");
            $table->string("level");
            $table->foreignIdFor(Lang::class)->constrained("langs")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speaks');
    }
};
