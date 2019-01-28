<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $guarded = [];

    public function complete($completed = true) {
        $this->update(compact('completed'));
    }

    public function incomplete() {
        $this->complete(false);
    }
}
