<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndolistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undolists', function (Blueprint $table) {
            $table->id();
            $table->string('menu', 128)->comment('メニュー');
            $table->unsignedBigInteger('minutes')->comment('所要時間');
            $table->string('target', 128)->comment('目的');
            $table->text('detail')->comment('詳細');
            $table->unsignedTinyInteger('level')->comment('運動強度:(1:低い, 2:普通, 3:高い)');
            $table->unsignedBigInteger('user_id')->comment('作成者');
            $table->foreign('user_id')->references('id')->on('users'); // 外部キー制約
            //$table->timestamps();
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('undolists');
    }
}
