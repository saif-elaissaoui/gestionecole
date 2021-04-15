<?php

chdir('..');
include_once 'services/ClasseService.php';
extract($_POST);

$ds = new ClasseService();
if (isset($op)) {
    if ($op != '') {
        if ($op == 'add') {
            $ds->create(new Classe(0, $code, $idFiliere));
        } elseif ($op == 'update') {
            $ds->update(new Classe($id, $code, $idFiliere));
        } elseif ($op == 'delete') {
            $ds->delete($ds->delete($id));
        } elseif ($op == 'count') {
            header('Content-type: application/json');
            echo json_encode($ds->getClasseByFiliere());
        }
    }
} else {
    if (isset($op)) {
        if ($op !== 'count') {
            header('Content-type: application/json');
            echo json_encode($ds->findAll());
        }
    } else {
        header('Content-type: application/json');
        echo json_encode($ds->findAll());
    }
}

  

