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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->unique();
            $table->string('phone')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('gender')->nullable();
            $table->date('birthdate')->nullable();

            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();

            $table->string('currency')->default('USD');
            $table->string('language')->default('en');
            $table->string('company_name')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('business_type')->nullable();
            $table->string('website')->nullable();
            $table->string('account_status')->default('active');
            $table->boolean('is_verified')->default(false);

            $table->string('preferred_payment_method')->nullable();
            $table->string('preferred_shipping_method')->nullable();
            $table->boolean('receive_newsletter')->default(false);

            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->boolean('two_factor_enabled')->default(false);

            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username', 'phone', 'profile_picture', 'gender', 'birthdate',
                'country', 'state', 'city', 'address', 'zip_code',
                'currency', 'language', 'company_name', 'tax_id', 'business_type', 'website',
                'account_status', 'is_verified', 'preferred_payment_method', 'preferred_shipping_method',
                'receive_newsletter', 'last_login_at', 'last_login_ip', 'two_factor_enabled',
                'google_id', 'facebook_id', 'twitter_id'
            ]);
        });
    }

};
