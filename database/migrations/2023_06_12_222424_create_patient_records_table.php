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
        Schema::create('patient_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id');
            $table->foreign('hospital_id')
                ->nullable()
                ->references('id')
                ->on('hospitals');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')
                ->nullable()
                ->references('id')
                ->on('patients');
            $table->unsignedBigInteger('bed_id');
            $table->foreign('bed_id')
                ->nullable()
                ->references('id')
                ->on('beds');
            $table->date('date_of_admission');
            $table->date('date_of_release')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_records');
    }
};
