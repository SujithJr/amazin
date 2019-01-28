<?php

namespace App;

// use App\Tasks;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $guarded = [];

    public function tasks() {
        // dd($this);
        return $this->hasMany(\App\Tasks::class, 'project_id');
    }

    public function addTask($task) {
        $this->tasks()->create($task);
        // return Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description
        // ]);
    }
}
