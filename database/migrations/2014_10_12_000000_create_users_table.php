<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw("CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()"));
            $table->tinyInteger('role_id')->nullable()->default(3);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('full_name');
            $table->string('student_id')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable()->default('1994-11-11');
            $table->tinyInteger('gender')->nullable();
            $table->string('class')->nullable();
            $table->string('department')->nullable();
            $table->string('faculty')->nullable();
            $table->string('language')->nullable();
            $table->text('about_me')->nullable();
            $table->string('avatar_path')->nullable()->default('avatar.png');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_email_confirmed')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
