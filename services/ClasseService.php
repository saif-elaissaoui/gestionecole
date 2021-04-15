<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClasseService
 *
 * @author XPS
 */
include_once 'dao/IDao.php';
include_once 'connexion/Connexion.php';
include_once 'beans/Classe.php';

class ClasseService implements IDao {

    private $connexion;

    public function __construct() {
        $this->connexion = new Connexion();
    }

    //put your code here
    public function create($o) {
        $query = "INSERT INTO classe VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getIdFiliere())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM classe WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select c.id, c.code, c.id_filiere, f.libelle from classe as c, filiere as f where c.id_filiere=f.id";
        $req = $this->connexion->getConnexion()->query($query);
        $c = $req->fetchAll(PDO::FETCH_OBJ);
        return $c;
    }

    public function findById($id) {
        
    }

    public function update($o) {
        $query = "UPDATE classe SET id_filiere = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getIdFiliere(), $o->getCode(), $o->getId())) or die('Error');
    }
    
       public function getClasseByFiliere() {
        $query = "select count(*) as nbr, filiere.libelle as filiere from classe,filiere where classe.id_filiere=filiere.id group by filiere.id;";
        $req = $this->connexion->getConnexion()->query($query);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
     public function findFiliere() {
        $query = "select classe.id,classe.code as nom,filiere.code from Classe,filiere where filiere.id=classe.id_filiere";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findFiliere1($code_filiere) {
        $query = "select classe.id,classe.code as nom,filiere.code from Classe,filieree where filiere.id=classe.id_filiere and id_filiere=?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($code_filiere));
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }
    
    
    
}
