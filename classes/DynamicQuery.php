<?php


class DynamicQuery
{

    private $connection;

    public function __construct($pdo)
    {
        $this->setConnection($pdo);
    }

    //Gets all values
    public function selectAll($table)
    {
        $sql = sprintf(
            'SELECT * FROM %s',

            $table
        );

        try{

            $statement = $this->getConnection()->prepare($sql);

            $statement->execute();

            $rows = $statement->fetchAll();

            return $rows;
        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }


    //This method will insert a query
    public function insert($table, $parameters)
    {
        $sql = sprintf
        (
            'insert into %s (%s) values (%s)',

            $table,

            implode(', ', array_keys($parameters)),

            ':' . implode(', :', array_keys($parameters))
        );

        try {
            var_dump($sql);

            $statement = $this->getConnection()->prepare($sql);

            $statement->execute($parameters);

            echo 'goed';
        } catch(PDOException $e) {
            //go to 404
            //for the purpose of testing this will output an exception
            die($e->getMessage());
        }
    }

    public function selectWhere($table, $parameters, $whereDb, $whereValue)
    {
        $sql = sprintf
        (
            'SELECT * FROM %s WHERE %s = %s',

            $table,

            $whereDb,

            $whereValue
        );

        print_r($sql);

        try {
            $statement = $this->getConnection()->prepare($sql);

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
            $statement = $this->getConnection()->prepare($sql);

            $statement->execute();
        } catch(PDOException $e) {
            die ($e->getMessage());
        }
    }

    public function select($table, $parameters)
    {
        $sql = sprintf (
            'select (%s) from %s',

            implode(', ', array_keys($parameters)),

            $table
        );

        try{

            $statement = $this->pdo->prepare($sql);

            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_CLASS);

        } catch(PDOException $e)
        {
            die($e->getMessage());
        }

    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }
}
