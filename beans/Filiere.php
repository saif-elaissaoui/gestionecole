<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Filiere
 *
 * @author XPS
 */
class Filiere {

    private $id;
    private $code;
    private $libelle;
    
    public function __construct($id, $code, $libelle) {
        $this->id = $id;
        $this->code = $code;
        $this->libelle = $libelle;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCode() {
        return $this->code;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    
    



}
