<?php
namespace lib\migration;
use lib\Migration as Migration;

class CreateTableMigration2 extends Migration
{
    public function up(){
        echo "CreateTableMigration2";
        return $this->prepare("SHOW TABLES FROM `vacancy`;");


    }
}