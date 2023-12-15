 

<?php

class memberDAO {

    private $dbConn;

 

    public function __construct($host, $user, $password, $dbname, $charset) {

        $this->dbConn = new mysqli($host, $user, $password, $dbname);

        $this->dbConn->set_charset($charset);

    }

 

    public function insertMember($mem) {

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

 

        $sql = "INSERT INTO mem_table $field VALUES $values";

        $this->dbConn->query($sql);

    }

}

?>