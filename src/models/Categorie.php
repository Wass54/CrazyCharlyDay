<?php
declare(strict_types=1);

namespace flashcards\models;

class Categorie extends \Illuminate\Database\Eloquent\Model{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
}