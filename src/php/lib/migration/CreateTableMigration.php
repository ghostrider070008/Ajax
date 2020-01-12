<?php
namespace lib\migration;
use lib\Migration as Migration;

class CreateTableMigration extends Migration
{
    public function up(){
        return $this->prepare("SHOW TABLES FROM `vacancy`;");


    }
}