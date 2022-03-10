<?php
declare(strict_types=1);

namespace flashcards\models;

class Produit extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'produit';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}