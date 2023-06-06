<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('shop_name')->nullable();
            $table->string('delivery_charge')->default(0);
            $table->string('shop_address')->nullable();
            $table->string('shop_contact')->nullable();
            $table->string('shop_licence_number')->nullable();
            $table->text('shop_icon')->nullable();
            $table->text('trade_licence')->nullable();
            $table->text('national_id')->nullable();
            $table->string('type')->default('hr');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status')->default('Active');
            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}