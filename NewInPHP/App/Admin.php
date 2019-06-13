<?php

namespace App;


abstract class Admin
{
    abstract public function insert();
    abstract public function update();
    abstract public function delete();
}