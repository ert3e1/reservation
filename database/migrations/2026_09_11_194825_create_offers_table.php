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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('supplier_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('property_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('import_id')
                ->constrained('imports')
                ->cascadeOnDelete();

            $table->string('external_id');

            $table->date('check_in');
            $table->date('check_out');

            $table->unsignedInteger('max_guests');

            $table->unsignedBigInteger('price');

            $table->string('currency', 3);

            $table->unsignedInteger('available_units');

            $table->timestamp('expires_at');

            $table->timestamps();

            $table->unique([
                'supplier_id',
                'external_id',
            ]);

            $table->index([
                'property_id',
                'check_in',
                'check_out',
                'price',
            ]);

            $table->index('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
