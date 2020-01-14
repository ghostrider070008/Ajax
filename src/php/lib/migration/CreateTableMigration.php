<?php
namespace lib\migration;
use lib\Migration as Migration;

class CreateTableMigration extends Migration
{
    public function up(){
        try {
            $sth = $this->pdo->prepare("CREATE TABLE IF NOT EXISTS `vacancy`.`current_migrations` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` varchar(255),
            `date` BIGINT,
            `status` INT,
            PRIMARY KEY (`id`));");
            $sth->execute();
            echo "Миграция выполнена успешно CreateTable";
        } catch (PDOException $e) {
            echo 'Во время выполнения возникла ошибка: ' . $e->getMessage();
        }




    }
    public function down(){
        if ($this->db_existance()){

            return $this->prepare("DROP TABLE `vacancy`.`current_migrations`;");
        }
        else{
            echo "Отмена миграции невозможна! БД не существует";
        }



    }
}