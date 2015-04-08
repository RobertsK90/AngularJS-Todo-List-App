<?php

use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    protected $guarded = [];

    public $timestamps = false;

    public function getCompletedAttribute($value) {
        return (boolean)$value;
    }
}