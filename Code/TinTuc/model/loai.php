<?php

namespace model;

class Loai extends DB
{
    public
        $idLoai,
        $idCL,
        $TenLoai,
        $TenKhongDau,
        $ThuTu,
        $AnHien,
        $hinh;
    const tableName = 'nn_loai';
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
            $this->idLoai = !empty($loai["idLoai"]) ? $loai["idLoai"] : null;
            $this->idCL = !empty($loai["idCL"]) ? $loai["idCL"] : null;
            $this->TenLoai = !empty($loai["TenLoai"]) ? $loai["TenLoai"] : null;
            $this->TenKhongDau = !empty($loai["TenKhongDau"]) ? $loai["TenKhongDau"] : null;
            $this->ThuTu = !empty($loai["ThuTu"]) ? $loai["ThuTu"] : null;
            $this->AnHien = !empty($loai["AnHien"]) ? $loai["AnHien"] : null;
            $this->hinh = !empty($loai["hinh"]) ? $loai["hinh"] : null;
        }
    }
    public function ChungLoai()
    {
        return new ChungLoai($this->idCL);
    }
    public function GetLoaiByChungLoai($idCL)
    {
        $where = "`idCL` = '{$idCL}'";
        return $this->SelectRows($where);
    }
    public function Post($model)
    {
        return $this->InsetModel($model);
    }
    public function Put($model)
    {
        $where = "`idLoai` = '{$model["idLoai"]}'";
        return $this->UpdateModel($model, $where);
    }
    public function Delete($idLoai)
    {
        $where = "`idLoai` = '{$idLoai}'";
        return $this->DeleteDataTable($where);
    }

    public function GetById($idLoai)
    {
        $where = "`idLoai` = '{$idLoai}'";
        return $this->SelectRow($where);
    }
    public function GetByName($name)
    {
        $where = "`TenLoai` like '%{$name}%'";
        return $this->SelectRows($where);
    }
    public function hinh()
    {
        return $this->hinh;
    }
    public function AnHien()
    {
        $anhien = ["Ẩn", "Hiện"];
        return $anhien[$this->AnHien];
    }
}
