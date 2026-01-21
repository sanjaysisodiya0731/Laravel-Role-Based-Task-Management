<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAssign extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string|null
     */
    protected $table = "task_assigns";

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'task_id',
        'assigned_to',
        'assigned_by',
    ];

    /* CReate relationship */
    public function task(){
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    public function assignedByManager(){
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
