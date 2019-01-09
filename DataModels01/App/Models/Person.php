<?php

namespace App\Models;

use App\Model;

class Person extends Model
{
    public $lastname;
    public $age;

    protected static $table = 'persons';

}