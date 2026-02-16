<?php
namespace app\models;

use Flight;

class UserModel {

    private $db;
    private $id_user;
    private $pseudo;
    private $mdp;
    private $avatar;
    private $type;

    public function __construct($db){
        $this->db = $db;
    }

    public function setIdUser($id){
        $this->id_user = $id;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function setMdp($mdp){
        $this->mdp = $mdp;
    }

    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

    public function setType($type){
        $this->type = $type;
    }


    public function create(){
        $sql = "INSERT INTO user (pseudo, mdp, avatar, type) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $this->pseudo,
            $this->mdp,
            $this->avatar,
            $this->type
        ]);
    }

    public function update(){
        $sql = "UPDATE user 
                SET pseudo = ?, mdp = ?, avatar = ?, type = ?
                WHERE id_user = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $this->pseudo,
            $this->mdp,
            $this->avatar,
            $this->type,
            $this->id_user
        ]);
    }


    public function delete(){
        $sql = "DELETE FROM user WHERE id_user = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$this->id_user]);
    }


    public function findById($id){
        $sql = "SELECT * FROM user WHERE id_user = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

 
    public function getUserByEmailMdp($pseudo, $mdp){
        $sql = "SELECT * FROM user WHERE pseudo = ? AND mdp = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$pseudo, $mdp]);
        return $stmt->fetch();
    }


    public function getAll(){
        $sql = "SELECT * FROM user ORDER BY id_user DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function getnbruser(){
        $sql="SELECT COUNT(id_user) as nbr_user FROM user WHERE type='CUSTOMER'";
        $stmt=$this->db->query($sql);
        return $stmt->fetch();
    }
}
