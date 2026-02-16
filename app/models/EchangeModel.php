<?php
namespace app\models;

use Flight;

class EchangeModel {
    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getnbrechangeeffectuer(){
        $sql="SELECT COUNT(id_echange) as nbr_echange FROM echange WHERE id_status=3";
        $stmt=$this->db->query($sql);
        return $stmt->fetch();
    }
}
