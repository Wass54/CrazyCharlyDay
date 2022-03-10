<?php
declare(strict_types=1);

namespace custumbox\models;

class Boite extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'boite';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}