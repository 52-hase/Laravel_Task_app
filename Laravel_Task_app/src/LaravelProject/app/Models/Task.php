<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // タスクのステータス（状態）を定義
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];
    
    // ステータスのラベルを取得するメソッド
    public function getStatusLabelAttribute()
    {
        // タスクのステータス値を取得
        $status = $this->attributes['status'];

        // 定義されたステータスに存在しない場合は空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        // 該当するステータスのラベルを返す
        return self::STATUS[$status]['label'];
    }

    /**
     * 状態を表すHTMLクラスのアクセサメソッド
     * 
     * @return string
     */
    public function getStatusClassAttribute()
    {
        $status = $this->attributes['status'];

        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }
}
