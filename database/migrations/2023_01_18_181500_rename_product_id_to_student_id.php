<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProductIdToStudentId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_tag', function (Blueprint $table) {
            $table->renameColumn('product_id', 'student_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_tag', function (Blueprint $table) {
            $table->renameColumn('student_id', 'product_id');
        });
    }
}
