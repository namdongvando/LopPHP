<?php 
namespace model;
interface ITin{
    
    public function Post($Model);
    public function Put($Model);
    public function Delete($id);
    public function GetById($id);
    
}
 