<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->string('author')->nullable();
            $table->string('seo')->nullable();
            $table->string('publish_status')->nullable();
            $table->integer('featured')->unsigned()->nullable()->default(0);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('author');
            $table->dropColumn('seo');
            $table->dropColumn('publish_status');
            $table->dropColumn('featured');
        });
    }
}
