<?php

class Database
{
    public static function connect($config)
    {
        try{        
            return new PDO(
                $config['connection'].';dbname='.$config['name'],

                $config['username'], 
                
                $config['password']
            );
        } catch(PDOException $e) {
            die("No connection made" . $config['name']);
        }
    }
}
