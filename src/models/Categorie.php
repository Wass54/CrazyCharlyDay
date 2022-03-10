<?php
declare(strict_types=1);

namespace custumbox\models;

class Categorie extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}