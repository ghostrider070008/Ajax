<?php
namespace lib\migration;
use lib\Migration as Migration;

class m_140120201629_CreateTableImg extends Migration
{
    public function up(){
        try {
            $sth = $this->pdo->prepare("CREATE TABLE IF NOT EXISTS `vacancy`.`img` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `title` varchar(255),
            `id_article` INT, 
            `puth` LONGTEXT,
            `date_created` timestamp,
            `date_update` timestamp,
            `status` INT,
            PRIMARY KEY (`id`));");
            $sth->execute();

        } catch (PDOException $e) {
            echo 'Во время выполнения возникла ошибка: ' . $e->getMessage();
        }




    }
    public function down(){
        if ($this->db_existance()){

            return $this->prepare("DROP TABLE `vacancy`.`img`;");
        }
        else{
            echo "Отмена миграции невозможна! БД не существует";
        }



    }
}