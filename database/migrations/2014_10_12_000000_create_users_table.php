<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('general_refer_bonus')->default(0);
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('otp')->nullable();
            $table->string('active_status')->default(0);
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('my_referral_id');
            $table->string('referral_by');
            $table->text('profile')->nullable();
            $table->text('nid_font')->nullable();
            $table->string('country');
            // referal
            $table->float('referal_bonus')->default(0);
            $table->float('generation_bonus')->default(0);
            $table->float('group_bonus')->default(0);
            $table->float('global_salse_commission')->default(0);
            $table->float('leadership_bonus')->default(0);
            $table->float('rank_bonus')->default(0);
            $table->float('purchase_bonus')->default(0);
            $table->float('cashback')->default(0);
            $table->integer('my_referral')->default(0);
            $table->string('rank')->default('General User');

            // account
            $table->float('my_balance')->default(0);
            $table->float('withdrew_balance')->default(0);
            $table->float('my_income')->default(0);
            $table->float('main_balance')->default(0);
            $table->string('status')->default('Inactive');
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
        Schema::dropIfExists('users');
    }
}