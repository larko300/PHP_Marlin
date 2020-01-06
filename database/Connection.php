<?php

/**
 * undocumented class
 */
class Connection
{
    public static function make($config){
        return new PDO(
        "{$config['connection']};dbname={$config['databasename']};charset={$config['charset']};",
        $config['username'],
        $config['password']);
      }
}
