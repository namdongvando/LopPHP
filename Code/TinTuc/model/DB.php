<?php

namespace model;

class DB
{
    public static $DB;

    public function __construct()
    {
        if (self::$DB == null)
            self::$DB = $GLOBALS['db'];
    }

    function GetRows($sql)
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
    function GetRow($sql)
    {
        $res = self::$DB->query($sql);
        if ($res == null) {
            return null;
        }
        return $res->fetch_assoc();
    }

    public function InsetModel($tableName, $data)
    {
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
    public function UpdateModel($tableName, $Model, $where)
    {
        $strSet = "";
        foreach ($Model as $key => $val) {
            $strSet .= "`{$key}`='{$val}',";
        }
        $strSet = substr($strSet, 0, -1);
        $sql = "UPDATE `tin` SET 
         {$strSet}
         WHERE {$where}";
    }
}
