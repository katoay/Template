<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Asantibanez\LaravelEloquentStateMachines\Traits\HasStateMachines;
use App\StateMachines\BasicStateMachine;

class TableLine extends Model implements Auditable
{
    // Example
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    Use HasStateMachines;
    protected $primaryKey = 'table_line_id';
    protected $fillable = [
            'table_id','table_code','table_desc','table_parent_id',
            'long_text_1','long_text_2','long_text_3','long_text_4',
            'logic_1','logic_2','logic_3','logic_4','logic_5',
            'num_1','num_2','num_3','num_4',
            'date_1','date_2','date_3','date_4'
    ];

    // public $stateMachines = [
    //     'state' => BasicStateMachine::class
    // ];  

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            // ... code here

        });

        self::created(function($model){
            if($model->table_code == '{{$self}}')
            {
                $model->table_code  = $model->table_line_id;
                $model->save();
            }
        });

        self::updating(function($model){
            // ... code here
        });

        self::updated(function($model){
            // ... code here
        });

        self::deleting(function($model){
            // ... code here
        });

        self::deleted(function($model){
            // ... code here
        });
    }
}
