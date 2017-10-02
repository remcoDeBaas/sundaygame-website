<?php


class DynamicQuery 
{
    
    protected $pdo; 

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Gets all values
    public function selectAll($table)
    {
        $sql = sprintf(
            'select * from %s',

            $table
        );

        $statement = $this->pdo->prepare($sql);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    
    //
    public function insert($table, $parameters)
    {
        $sql = sprintf
        (
            'insert into %s (%s) values (%s)',

            $table,

            implode(', ', array_keys($parameters)),

            ':' , implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            
            $statement->execute($parameters);
        } catch(PDOException $e) {
            //go to 404
            //for the purpose of testing this will output an exception
            die($e->getMessage());
        }
    }

    public function selectWhere($table, $parameters, $where)
    {
        $sql = sprintf
        (
            'select %s from %s where %s',

            implode(', ', array_keys($parameters)),

            $table,

            $where
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS);
        } catch(PDOException $e)
        {
            die ($e-getMessage());
        }
    }

    public function update($table, $parameters, $id)
    {
        $sql = sprintf(
            'update %s set %s %s where %s',

            $table,

            implode(array_keys($parameters)),
            
            implode(' = ', array_keys($parameters) , ', '),
            
            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch(PDOException $e) {
            die ($e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $sql = sprintf (
            'delete from %s where %s',

            $table,

            $id
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();
        } catch(PDOException $e) {
            die ($e->getMessage());
        }
    }
}
