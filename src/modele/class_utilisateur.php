<?php
class Utilisateur{
    private $db;
    private $insert;
public function __construct($db){
        $this->db = $db;
        $this->insert = $db->prepare("insert into utilisateur(nom, prenom, adresse, cp, ville) values
(:nom, :prenom, :adresse, :cp, :ville)");    
    }
        public function insert($nom, $prenom, $adresse, $cp, $ville){
        $r = true;
        $this->insert->execute(array(':nom'=>$nom, ':prenom'=>$prenom, ':adresse'=>$adresse, ':cp'=>$cp,
':ville'=>$ville));
        if ($this->insert->errorCode()!=0){
             print_r($this->insert->errorInfo());  
             $r=false;
        }
        return $r;
    }
}
?>

