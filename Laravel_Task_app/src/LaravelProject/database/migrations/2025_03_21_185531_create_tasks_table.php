<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // 主キーとして自動インクリメントする整数型のカラム「id」を作成
            $table->increments('id');
            
            // フォルダIDを格納する「folder_id」カラムを作成（UNSIGNED INTEGERとして設定）
            $table->integer('folder_id')->unsigned();
            
            // タスクのタイトルを格納する「title」カラムを作成（最大長100文字の文字列）
            $table->string('title', 100);
            
            // タスクの期限日を格納する「due_date」カラムを作成（DATE型）
            $table->date('due_date');
            
            // ステータスを格納する「status」カラムを作成（デフォルト値「1」）
            $table->integer('status')->default(1);
            
            // タイムスタンプ「created_at」と「updated_at」を管理するカラムを自動的に作成
            $table->timestamps();
        
            // 外部キー制約を「folder_id」カラムに設定（参照先は「folders」テーブルの「id」カラム）
            $table->foreign('folder_id')->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
