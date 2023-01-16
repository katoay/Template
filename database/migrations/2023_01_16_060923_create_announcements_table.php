<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id('announcement_id');
            $table->string('object_type')->nullable();
            $table->string('announcement_header')->nullable();
            $table->longtext('announcement_desc')->nullable();
            $table->string('created_by')->nullable();
            $table->boolean('flag')->default(0);
            $table->boolean('active')->default(0);
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('announcements');
    }
};
