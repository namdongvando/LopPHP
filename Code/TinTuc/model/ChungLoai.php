<?php

namespace model;

class ChungLoai extends DB
{
    public

        $idCL,
        $TenCL,
        $AnHien,
        $ThuTu;
    const tableName = 'chungloai';
    /**
     * Class constructor.
     */
    function __construct($loai = null)
    {
        parent::__construct(self::tableName);
        if (!is_array($loai)) {
            $loai = $this->GetById($loai);
        }
        if ($loai) {
            $this->idCL = !empty($loai["idCL"]) ? $loai["idCL"] : null;
            $this->TenCL = !empty($loai["TenCL"]) ? $loai["TenCL"] : null;
            $this->AnHien = !empty($loai["AnHien"]) ? $loai["AnHien"] : null;
            $this->ThuTu = !empty($loai["ThuTu"]) ? $loai["ThuTu"] : null;
        }
    }
    // láy tat cả loại theo chung loai
    public function Loais()
    {
        $modelLoai = new Loai();
        return $modelLoai->GetLoaiByChungLoai($this->idCL);
    }
    public function Post($model)
    {
        return $this->InsetModel($model);
    }
    public function Put($model)
    {
        $where = "`idCL` = '{$model["idCL"]}'";
        return $this->UpdateModel($model, $where);
    }
    public function Delete($idCL)
    {
        $where = "`idCL` = '{$idCL}'";
        return $this->DeleteDataTable($where);
    }

    public function GetById($idCL)
    {
        $where = "`idCL` = '{$idCL}'";
        return $this->SelectRow($where);
    }
    public function GetByName($name)
    {
        $where = "`TenCL` like '%{$name}%'";
        return $this->SelectRows($where);
    }

    public function AnHien()
    {
        $anhien = ["Ẩn", "Hiện"];
        return $anhien[$this->AnHien];
    }
}
