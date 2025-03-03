<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
            $table->date('start_date')->after('user_id');
            $table->date('end_date')->after('start_date');
            $table->text('reason')->nullable()->after('end_date');
            $table->string('status')->default('pending')->after('reason');
        });
    }

    public function down()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'start_date', 'end_date', 'reason', 'status']);
        });
    }
};
