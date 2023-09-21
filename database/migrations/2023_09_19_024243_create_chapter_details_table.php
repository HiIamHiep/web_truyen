<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateChapterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->string('storage_image');
            $table->timestamp('created_at')->default(DB::raw('current_timestamp'));
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_details');
    }
}
