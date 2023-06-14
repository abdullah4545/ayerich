<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixeddepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixeddeposits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date');
            $table->integer('bank_id');
            $table->string('bank_name');
            $table->text('account_number');
            $table->text('trx_id');
            $table->decimal('amount',10,2)->default(0);
            $table->decimal('monthly_interest',10,2)->default(0);
            $table->decimal('total_interest',10,2)->default(0);
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('fixeddeposits');
    }
}
