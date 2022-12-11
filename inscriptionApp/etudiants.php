<?php 
 require_once 'DB/connexion.php';
 
  require_once 'functions/inscription.func.php';
    $et = getEtudiants();
     ?>

<!doctype html>
<html lang="en">
<head>
    <title>Liste Etudiants</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container jumbotron">
        <p class="display-4 text-center mb-5" style="font-family: 'Times New Roman'">Liste des étudiants</p>
        <table class="table table-bordered table-striped table-light">
            <thead>
            <tr class="table-primary text-center">
                <th scope="col">#</th>
                <th scope="col">Matricule</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Classe</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <?php foreach($et as $etud){ ?>
                    <tr>
                        <td><?= $etud['idetudiant'] ?></td>
                        <td><?= $etud['matriculeetudiant'] ?></td>
                        <td><?= ucfirst($etud['nometudiant']) ?></td>
                        <td><?= ucfirst($etud['prenometudiant'])?></td>
                        <td><?= $etud['libelleClasse'] ?></td>
                    </tr>
                    <?php } ?>
                 </table>
        <a href="index.php" class="btn btn-outline-dark btn-block mt-5">Retour à l'inscription</a>
    </div>

    <script src="assets/js/myScript.js"></script>

</body>
</html>