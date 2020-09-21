<?php

namespace Ali\Core\Database;
use PDO;

class Connection
{
    public static function make($config)
    {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['dbname'],
                $config['dbusername'],
                $config['dbpassword'],
                $config['options']
            );
        } catch (PDOException $e) {
            die("Could not connect:");
        }
    }
}
