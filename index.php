<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if ($_SESSION["employe"]) {
    if ($_SESSION['role'] == "Admin") {
        ?>
        <!DOCTYPE html>
        <html lang="FR">

            <head>
                <meta charset="UTF-8">
                <title>Gestion Ecole</title>


                <link rel='stylesheet' href='vendor/bootstrap-4.1/bootstrap.min.css'>
                <link rel='stylesheet' href='vendor/font-awesome-5/css/fontawesome-all.min.css'>
                <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
                <link rel="stylesheet" href="style/style.css">
                <link rel="stylesheet" href="style/theme.css">
                <link rel="stylesheet" href="style/main.css">
                <link href="cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
                <script src='vendor/jquery-3.2.1.min.js'></script>
                <script src='vendor/bootstrap-4.1/popper.min.js'></script>
                <script src='vendor/bootstrap-4.1/bootstrap.min.js'></script>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
            </head>
            <body>
                <div class="page-wrapper chiller-theme toggled">
                    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                    <nav id="sidebar" class="sidebar-wrapper">
                        <div class="sidebar-content">
                            <div class="sidebar-brand">
                                <a href="./" class="h2 pt-2">Gestion ecole</a>
                                <div id="close-sidebar">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="sidebar-header">
                                <div class="user-pic">
                                    <img class="img-responsive img-rounded"
                                         src="img/<?php
                                         if (isset($_SESSION['photo'])) {
                                             echo $_SESSION['photo'];
                                         } else
                                             echo 'no-photo.png'
                                             ?>"
                                         alt="User picture">
                                </div>
                                <div class="user-info">
                                    <span class="user-name">
                                        <strong><?php
                                            if (isset($_SESSION['nom'])) {
                                                echo $_SESSION['nom'];
                                            }
                                            ?></strong>
                                    </span>
                                    <span class="user-role"><?php
                                        if (isset($_SESSION['role'])) {
                                            echo $_SESSION['role'];
                                        }
                                        ?></span>
                                    <span class="user-status">
                                        <i class="fa fa-circle"></i>
                                        <span>Online</span>
                                    </span>
                                </div>
                            </div>
                            <!-- sidebar-header  -->

                            <!-- sidebar-search  -->
                            <div class="sidebar-menu">
                                <ul>
                                    <li class="header-menu">
                                        <span>Gestion</span>
                                    </li>
                                    <li>
                                        <a href="./index.php?p=classe"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Classe</a>
                                    </li>
                                    <li>
                                        <a href="./index.php?p=filiere"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Filiere</a>
                                    </li>
                                    <li>
                                    <a href="./index.php?p=historique"> <i class="zmdi zmdi-hc-1x zmdi-check"> </i>Les classes de chaque filiere</a>
                                </li>
                                    <li class="header-menu">
                                        <span>Statistique</span>
                                    </li>
                                    <li>
                                        <a href="./index.php?p=statistiques"><i class="zmdi zmdi-hc-1x zmdi-group-work"></i>Statistiques</a>
                                    </li>


                                </ul>
                            </div>
                            <!-- sidebar-menu  -->
                        </div>
                        <!-- sidebar-content  -->
                        <div class="sidebar-footer">
                            <a href="./logout.php">
                                <i class="fa fa-power-off"></i>
                                <span>Déconnexion</span>
                            </a>
                        </div>
                    </nav>
                    <!-- sidebar-wrapper  -->
                    <main class="page-content">
                        <div class="container-fluid" id="main-content">

                            <?php
                            if (isset($_GET['p']) && $_GET['p'] != "") {
                                if ($_GET['p'] == "filiere") {
                                    include_once './pages/filiere.php';
                                } elseif ($_GET['p'] == "classe") {
                                    include_once './pages/classe.php';
                                } elseif ($_GET['p'] == "historique") {
                                include_once './pages/historique.php';
                                } elseif ($_GET['p'] == "statistiques") {
                                    include_once './pages/statistiques.php';
                                }
                            } else {
                                include_once './pages/filiere.php';
                            }
                            ?>
                        </div>

                    </main>
                    <!-- page-content" -->
                </div>
                <!-- page-wrapper -->
                <script src="script/index.js"></script>

            </body>
        </html>
        <?php
    } else {
        include_once './pages/HistoriqueSimple.php';
    }
} else {
    header('Location:./login.php');
}
?>