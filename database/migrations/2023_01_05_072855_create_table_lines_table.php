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
        Schema::create('table_lines', function (Blueprint $table) {
            $table->id('table_line_id');
            $table->string('table_id', 100)->nullable();
            $table->string('table_code', 100)->nullable();
            $table->text('table_desc')->nullable();
            $table->unsignedBigInteger('table_parent_id')->nullable();
            $table->text('long_text_1')->nullable();
            $table->text('long_text_2')->nullable();
            $table->text('long_text_3')->nullable();
            $table->text('long_text_4')->nullable();
            $table->text('logic_1')->nullable();
            $table->text('logic_2')->nullable();
            $table->text('logic_3')->nullable();
            $table->text('logic_4')->nullable();
            $table->text('logic_5')->nullable();
            $table->float('num_1', 8, 2)->default(0);
            $table->float('num_2', 8, 2)->default(0);
            $table->float('num_3', 8, 2)->default(0);
            $table->float('num_4', 8, 2)->default(0);
            $table->date('date_1')->nullable();
            $table->date('date_2')->nullable();
            $table->date('date_3')->nullable();
            $table->date('date_4')->nullable();
            $table->bigInteger('textContentId')->nullable();
            $table->softDeletesTz($column = 'deleted_at', $precision = 0);
            $table->timestamps();

            $table->foreign('table_parent_id')->references('table_line_id')->on('table_lines')
                ->nullable()
                ->onDelete('cascade');

            $table->index(['table_parent_id', 'table_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_lines');
    }
};
