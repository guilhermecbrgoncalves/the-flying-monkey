<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbooks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->date('date');
            $table->string('aircraft', 50);
            $table->time('departure_time');
            $table->string('departure_place', 5);
            $table->time('arrival_time');
            $table->string('arrival_place', 5);
            $table->time('total_flight_time')->nullable();;
            $table->integer('take_offs');
            $table->integer('landings');
            $table->string('type_of_flight', 3);
            $table->text('notes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logbooks');
    }
}
