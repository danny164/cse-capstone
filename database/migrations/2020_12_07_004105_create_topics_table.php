<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->text('eng_title');
            $table->text('vie_title');
            $table->text('ini_title');
            $table->longText('description');
            $table->bigInteger('group_id')->unsigned();
            $table->bigInteger('team_id')->unsigned()->unique()->nullable();
            $table->bigInteger('user_id_claim')->unsigned()->nullable();
            $table->boolean('is_approved')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()"));
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
