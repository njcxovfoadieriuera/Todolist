<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Task extends Model
{
    use HasFactory;
    const STATUS = [
        1 => [ 'label' => '未着手', 'class' => 'label-danger' ],
        2 => [ 'label' => '着手中', 'class' => 'label-info' ],
        3 => [ 'label' => '完了', 'class' => '' ],
    ];

    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];
        

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    public function getStatusClassAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['class'];
    }

    public function getFormattedDueDateAttribute()
    {
        // 状態値
        // $status = $this->attributes['status'];
        // if (isset($this->attributes['due_date'])) {
        //     // attributes['due_date']に値がある場合の処理
        //     // 例：値を取得して表示する
        //     $dueDate = $this->attributes['due_date'];
        //     echo "Due Date: " . $dueDate;
        // } else {
        //     // attributes['due_date']に値がない場合の処理
        //     echo "Due Dateは設定されていません。";
        // }
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }

    // protected $table = 'tasks';
    // protected $fillable = 
    // [
    //     'id',
    //     'filder_id',
    //     'title',
    //     'status',
    //     'due_date',
    //     'created_at',
    //     'updated_at',
    // ];

    // protected $casts = [
    //     'first_logged_in_at' => 'datetime:Y-m-d',
    //     'created_at' => 'datetime:Y-m-d H:i:s',
    //     'updated_at' => 'datetime:Y-m-d H:i:s',
    // ];

    // public $timestamps = false;
}
