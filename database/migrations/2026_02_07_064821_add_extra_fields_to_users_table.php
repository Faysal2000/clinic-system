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
            $table->string('user_name')->nullable()->after('email');
            $table->string('phone')->nullable()->after('user_name');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('password');
            $table->boolean('super_admin')->default(false)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_name', 'phone', 'status', 'super_admin']);
        });
    }
};
