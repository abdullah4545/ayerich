<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadershipranksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leadershipranks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount_range',10,2)->default(0);
            $table->integer('account_limit');
            $table->integer('bonus_amount');
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('leadershipranks');
    }
}
