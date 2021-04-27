<?php  
namespace model;

class Tin extends DB  implements ITin
{

    public 
    $idTin, 
    $TieuDe, 
    $TieuDe_KhongDau, 
    $TomTat, 
    $urlHinh, 
    $Ngay, 
    $Content, 
    $idLT, 
    $AnHien, 
    $TinHot;
    /**
     * Class constructor.
     */
    function __construct($tin =null)
    {
        parent::__construct();
        if($tin){
            $this->idTin=!empty($tin["idTin"])?$tin["idTin"]:null;
            $this->TieuDe=!empty($tin["TieuDe"])?$tin["TieuDe"]:null;
            $this->TieuDe_KhongDau=!empty($tin["TieuDe_KhongDau"])?$tin["TieuDe_KhongDau"]:null;
            $this->TomTat=!empty($tin["TomTat"])?$tin["TomTat"]:null;
            $this->urlHinh=!empty($tin["urlHinh"])?$tin["urlHinh"]:null;
            $this->Ngay=!empty($tin["Ngay"])?$tin["Ngay"]:null;
            $this->Content=!empty($tin["Content"])?$tin["Content"]:null;
            $this->idLT=!empty($tin["idLT"])?$tin["idLT"]:null;
            $this->AnHien=!empty($tin["AnHien"])?$tin["AnHien"]:null;
            $this->TinHot=!empty($tin["TinHot"])?$tin["TinHot"]:null;
        }
        
    }
 
    public function Post($Model){
        $this->InsetModel("tin",$Model);
    }
    public function Put($Model){
        $where = "`idTin` = {$Model["idTin"]}";
        $this->UpdateModel("tin",$Model,$where);
    }
    public function Delete($id){

    }
    public function GetById($id){

    }

}