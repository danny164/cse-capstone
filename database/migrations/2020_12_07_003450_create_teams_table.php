<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('team_name');
            $table->bigInteger('group_id')->unsigned();
            $table->tinyInteger('visibility');
            $table->bigInteger('users_count')->unsigned()->default(0);
            $table->text('avatar_path')->nullable();
            $table->boolean('is_closed')->default(0);
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
        Schema::dropIfExists('teams');
    }
}
