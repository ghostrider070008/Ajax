<?php
namespace lib\migration;
use lib\Migration as Migration;

class CreateDataBaseMigration extends Migration
{
    public function up(){
        return $this->prepare("CREATE DATABASE IF NOT EXISTS `vacancy`");


    }
    public function down(){
        if ($this->db_existance()){
            return $this->prepare("DROP DATABASE `vacancy`");
        }
        else{
            echo "Отмена миграции невозможна! БД не существует";
        }



    }
}