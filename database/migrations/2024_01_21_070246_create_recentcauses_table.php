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
        Schema::create('recentcauses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->string('boxtitle');
            $table->text('boxdescription');
            $table->string('goal'); // Assuming 'goal' is an integer, adjust if it's another data type
            $table->string('raised'); // Assuming 'raised' is an integer, adjust if it's another data type
            $table->decimal('percentage', 5, 2); // Assuming 'percentage' is a decimal, adjust precision and scale as needed
            $table->string('button1');
            $table->string('button2');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recentcauses');
    }
};
