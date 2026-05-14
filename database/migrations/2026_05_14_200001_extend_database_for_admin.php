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
        // 1. Add is_read to contacts table
        Schema::table('contacts', function (Blueprint $table) {
            if (!Schema::hasColumn('contacts', 'is_read')) {
                $table->boolean('is_read')->default(false)->after('message');
            }
        });

        // 2. Create settings table
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // 3. Create admins table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
        Schema::dropIfExists('settings');
        
        Schema::table('contacts', function (Blueprint $table) {
            if (Schema::hasColumn('contacts', 'is_read')) {
                $table->dropColumn('is_read');
            }
        });
    }
};
