<?php
declare(strict_types=1);

namespace custumbox\models;

class Produit extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}