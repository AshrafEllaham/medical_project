<?php

class db
{
    protected $server = 'localhost';
    protected $username = 'root';
    protected $password = 'password';
    protected $db_name = 'medical_services';
    protected $conn = null;

    function __construct()
    {
        $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->db_name);

        if (!$this->conn) {
            die('error connection: ' . mysqli_connect_errno());
        }
    }

    public function db_insert($tableName, array $attributes)
    {
        $sql = 'INSERT INTO ' . $tableName . ' (';
        foreach ($attributes as $column => $value) {
            $sql .= '`' . $column . '`,';
        }
        $sql = rtrim($sql, ',') . ') VALUES (';
        foreach ($attributes as $column => $value) {
            $sql .= "'" . $value . "',";
        }
        $sql = rtrim($sql, ',') . ')';

        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            return 'Added Success';
        }

        return false;
    }

    public function get_row($tableName, $column, $value)
    {

        $sql = "SELECT * FROM `$tableName` WHERE `$column` = '$value'";

        $result = mysqli_query($this->conn, $sql);

        if ($result) {

            return mysqli_fetch_assoc($result);
        }

        return false;
    }

    public function get_rows($tableName, $conditions = [])
    {

        $sql = "SELECT * FROM `$tableName` ";

        if ($conditions) {
            $sql .=  "WHERE ";
            foreach($conditions as $condition){

                $sql .=  "`$condition[0]` $condition[1] '$condition[2]' and ";
            }
        }

        $sql = rtrim($sql, 'and ');
        $result = mysqli_query($this->conn, $sql);

        if ($result) {

            $rows = [];

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    public function db_update($tableName, $attributes, $col_condition, $col_value)
    {
        $sql = "UPDATE `$tableName` SET ";
        foreach ($attributes as $column => $value) {
            $sql .= "`$column`='$value', ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE `$col_condition` = '$col_value'";

        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            return 'Updated Success';
        }

        return false;
    }


    public function db_delete($tableName, $attribute, $value)
    {
        $sql = "DELETE FROM `$tableName` WHERE `$attribute`='$value'";

        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            return 'Deleted Success';
        }

        return false;
    }

    public function count_table($tableName, $conditions = [])
    {
        $sql = "SELECT * FROM `$tableName`";

        if ($conditions) {
            $sql .=  "WHERE ";
            foreach($conditions as $condition){

                $sql .=  "`$condition[0]` $condition[1] '$condition[2]' and ";
            }
        }
        
        $sql = rtrim($sql, 'and ');
        $result = mysqli_query($this->conn, $sql);
        
        if (!$result) {

            return mysqli_error($this->conn);
        }
        $rows = [];
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return count($rows);
    }
}
