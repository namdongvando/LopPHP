<?php

namespace model;

class DB
{
    public static $DB;
    public static $tableName;

    function __construct($tableName = null)
    {
        if ($tableName) {
            self::$tableName = $tableName;
        }
        if (self::$DB == null)
            self::$DB = $GLOBALS['db'];
    }

    protected function SelectRows($where, $col = [])
    {
        $tableName = self::$tableName;
        if ($col == false) {
            $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        } else {
            $strCol = implode("`, `", $col);
            $sql = "SELECT `$strCol` FROM `{$tableName}` WHERE {$where}";
        }
        return $this->GetRows($sql);
    }
    protected function SelectRow($where, $col = [])
    {
        $tableName = self::$tableName;
        if ($col == false) {
            $sql = "SELECT * FROM `{$tableName}` WHERE {$where}";
        } else {
            $strCol = implode("`, `", $col);
            $sql = "SELECT `$strCol` FROM `{$tableName}` WHERE {$where}";
        }
        //echo $sql;
        return $this->GetRow($sql);
    }

    protected function DeleteDataTable($where)
    {
        $tableName = self::$tableName;
        $sql = "DELETE FROM `{$tableName}` WHERE $where";
        return self::$DB->query($sql);
    }

    protected function GetRows($sql)
    {
        $res = self::$DB->query($sql);
        if ($res == null) {
            return null;
        }
        $a = [];
        while ($row = $res->fetch_assoc()) {
            $a[] = $row;
        }
        return $a;
    }
    protected function GetRow($sql)
    {
        $res = self::$DB->query($sql);
        if ($res == null) {
            return null;
        }
        return $res->fetch_assoc();
    }

    function InsetModel($data)
    {
        $tableName = self::$tableName;
        $col = array_keys($data);
        $val = array_values($data);
        // var_dump($col);
        $strCol = implode("`, `", $col);
        $strVal = implode("', '", $val);
        $sql = "INSERT INTO 
        `{$tableName}`(`{$strCol}`) 
        VALUES ('$strVal')";
        self::$DB->query($sql);
        return self::$DB;
    }
    function UpdateModel($Model, $where)
    {
        $tableName = self::$tableName;
        $strSet = "";
        foreach ($Model as $key => $val) {
            $strSet .= "`{$key}`='{$val}',";
        }
        $strSet = substr($strSet, 0, -1);
        $sql = "UPDATE `{$tableName}` SET 
         {$strSet}
         WHERE {$where}";
         self::$DB->query($sql);
    }
    public function GetAll()
    {
        $tableName = self::$tableName;
        $sql  = "SELECT * FROM `{$tableName}` WHERE 1";
        return $this->GetRows($sql);
    }
}
