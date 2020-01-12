<?php
//use lib\migration\CreateTableMigration;
Use lib\Migration as Migration;
use lib\ConnectTable;


define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');

include_once 'autoload.php';
$help  = 'Usage: php ' . $argv[0] . ' -h|-s|-m|-b|-r' . PHP_EOL;
$help .= 'Options:' . PHP_EOL;
$help .= '    -h --help       Show this message' . PHP_EOL;
$help .= '    -s --state      Show current state' . PHP_EOL;
$help .= '    -m --migrate    Change current state' . PHP_EOL;
$help .= '    -b --backup     Create database backup' . PHP_EOL;
$help .= '    -r --restore    Restore database from backup';

if ($argc == 2) { // должна быть только одна опция и это обязательно
    $params = array(
        'h::' => 'help::',
        's::' => 'state::',
        'm::' => 'migrate::',
        'b::' => 'backup::',
        'r::' => 'restore::'
    );
    $options = getopt(implode('', array_keys($params)), $params);

    $migration = new Migration(
        DB_HOST,
        DB_USER,
        DB_PASS
    );

    if (isset($options['help']) || isset($options['h'])) {
        // опция help (справка по использованию)
        echo $help;
    } elseif (isset($options['state']) || isset($options['s'])) {
        // опция state (текущее состояние базы данных)
        $k = new ConnectTable(
            DB_HOST,
            DB_USER,
            DB_PASS
        );
        print_r($k);
        print_r($migration);
        $migration->db_existance();
        $migration->connection_migration();
        $m = new lib\migration\CreateTableMigration2(
            DB_HOST,
            DB_USER,
            DB_PASS);
        echo PHP_EOL.$m->up().PHP_EOL;
        //print_r($m->up());
        //print_r($migration->find_migration_files());
        //print_r($migration->comparison_migration());

        if ($migration->isEmpty()){
            echo "БД пуста";
        }
        //$migration->state();
    } elseif (isset($options['migrate']) || isset($options['m'])) {
        // опция migrate (изменить состояние базы данных)
        $migration->migrate();;
    } elseif (isset($options['backup']) || isset($options['b'])) {
        // опция backup (создание резервной копии)
        $migration->backup();
    } elseif (isset($options['restore']) || isset($options['r'])) {
        // опция restore (восстановление из резервной копии)
        $migration->restore();
    } else {
        echo 'Syntax error, unkhown option', PHP_EOL;
        echo $help;
    }
} else {
    echo 'Syntax error, must be one option', PHP_EOL;
    echo $help;
}
