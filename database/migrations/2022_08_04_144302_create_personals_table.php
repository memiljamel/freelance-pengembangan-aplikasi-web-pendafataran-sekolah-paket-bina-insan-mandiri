<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('fullname', 70);
            $table->string('nickname', 70);
            $table->text('avatar');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('place_of_birth', 50);
            $table->date('date_of_birth');
            $table->enum('religion', ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->string('everyday_language', 50);
            $table->smallInteger('body_height');
            $table->smallInteger('body_weight');
            $table->string('address', 120);
            $table->smallInteger('distance');
            $table->string('father_name', 70);
            $table->string('mother_name', 70);
            $table->enum('father_education', ['SD', 'SLTP', 'SLTA', 'D3', 'S1', 'S2', 'S3']);
            $table->enum('mother_education', ['SD', 'SLTP', 'SLTA', 'D3', 'S1', 'S2', 'S3']);
            $table->string('father_job', 70);
            $table->string('mother_job', 70);
            $table->smallInteger('father_age');
            $table->smallInteger('mother_age');
            $table->string('education_category', 50);
            $table->string('other_choice', 50)->nullable();
            $table->text('birth_certificate');
            $table->text('identity_card');
            $table->text('family_card');
            $table->enum('status', ['Diproses', 'Diterima', 'Ditolak'])->default('Diproses');
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
}
