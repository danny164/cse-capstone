<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('group_name');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('due_date');
            $table->tinyInteger('visibility');
            $table->bigInteger('users_count')->unsigned()->default(0);
            $table->text('avatar_path')->nullable();
            $table->bigInteger('teams_count')->unsigned()->default(0);
            $table->boolean('is_closed')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()"));

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
        Schema::dropIfExists('groups');
    }
}
