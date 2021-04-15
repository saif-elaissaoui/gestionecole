<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FiliereService
 *
 * @author XPS
 */
include_once 'dao/IDao.php';
include_once 'connexion/Connexion.php';
include_once 'beans/Filiere.php';

class FiliereService implements IDao {

    //put your code here

    private $connexion;

    public function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO filiere VALUES (NULL,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCode(), $o->getLibelle())) or die('Error');
    }

    public function delete($id) {
        $query = "DELETE FROM filiere WHERE id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($id)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select * from filiere";
        $req = $this->connexion->getConnexion()->query($query);
        $c = $req->fetchAll(PDO::FETCH_OBJ);
        return $c;
    }

    public function findById($id) {
        
    }

    public function update($o) {
        $query = "UPDATE filiere SET libelle = ?,code=? where id = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getLibelle(), $o->getCode(), $o->getId())) or die('Error');
    }

}
