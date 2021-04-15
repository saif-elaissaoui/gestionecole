<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Classe
 *
 * @author XPS
 */
class Classe {

    private $id;
    private $code;
    private $idFiliere;
    
    public function __construct($id, $code, $idFiliere) {
        $this->id = $id;
        $this->code = $code;
        $this->idFiliere = $idFiliere;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCode() {
        return $this->code;
    }

    public function getIdFiliere() {
        return $this->idFiliere;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setIdFiliere($idFiliere) {
        $this->idFiliere = $idFiliere;
    }




}
