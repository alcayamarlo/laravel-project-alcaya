<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Medication;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('unit')->nullable(); // Add semicolon here
            $table->timestamps();
        });

        $medications = [
            ['name' => 'Paracetamol', 'price' => 10.00, 'unit' => 'tablet'],
            ['name' => 'Amoxicillin', 'price' => 15.00, 'unit' => 'capsule'],
            ['name' => 'Ibuprofen', 'price' => 12.00, 'unit' => 'tablet'],
            ['name' => 'Salbutamol', 'price' => 20.00, 'unit' => 'vial'],
            ['name' => 'Metformin', 'price' => 8.00, 'unit' => 'tablet'],
            ['name' => 'Omeprazole', 'price' => 18.00, 'unit' => 'capsule'],
            ['name' => 'Cefuroxime', 'price' => 30.00, 'unit' => 'vial'],
        ];

        foreach ($medications as $medication) {
            Medication::create($medication);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medications'); // Fixed: should be plural
    }
};
