<?php
class memberDAO {
    private $dbConn;

    public function __construct($host, $user, $password, $dbname, $charset) {
        $this->dbConn = new mysqli($host, $user, $password, $dbname);
        $this->dbConn->set_charset($charset);
    }

    public function insertRow($table, $mem) {
        // INSERT INTO mem_table 
        // (username, email, birth, mobile)
        // VALUES
        // ('username', 'email', 'birth', 'mobile')
        $field = '(';
        $values = '(';

        foreach($mem as $key => $value) {
            $field .= "$key,";
            $values .= "'$value',";
        }
        $field = rtrim($field, ',') . ")";
        $values = rtrim($values, ',') . ")";

        $sql = "INSERT INTO $table $field VALUES $values";
        $this->dbConn->query($sql);
    }

    public function getRowsByCondition($table, $cond=null) {
        if($cond !== null) {
            $where = "WHERE ";
            foreach($cond as $key => $value) {
                $where .= " $key = '$value' AND";
            }
            $where = rtrim($where, 'AND');
        }
        else {
            $where = "";
        }
        $sql = "SELECT * FROM $table $where";
        $rs = $this->dbConn->query($sql);
        $rows = $rs->fetch_all(MYSQLI_ASSOC);
        
        return $rows;
    }
}
?>