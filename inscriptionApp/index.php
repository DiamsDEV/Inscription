<?php 
 require_once 'DB/connexion.php';
 
  require_once 'functions/inscription.func.php';
?>
<!doctype html>
<html lang="en">
<head>
     <title>Inscription App.</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<?php
    if (isset($_POST["inscrire"])) {
       extract($_POST);                 // permet de verifier la validité dun nom de variable.
       addEtudiant($matricule,$nom,$prenom,$dateNaissance,$telephone,$adresse,$classe,$annee);
    }
    $matricule=generermatricule(nbetudiants()['nbEtu']);
    $spe = getClasses();
    $an = getAnnees();
       
?>
    <div class="container jumbotron">
        <form class="col-sm-8 offset-sm-2" method="post" >
            <h3 id="titre" class="display-4 mb-5 text-center" style="font-family: 'Times New Roman'">INSCRIPTION</h3>
            <hr>
            <div class="form-group mt-5">
                <label for="">Matricule </label>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input type="text" class="form-control" id="matricule" name="matricule" value="<?=$matricule?>" readonly>
                    <button type="button" class="btn btn-outline-primary ml-3" id="changer">Switch</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Nom (*)</label>
                        <input required type="text" class="form-control" id="nom" name="nom" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="">Prénom (*)</label>
                        <input required type="text" class="form-control" id="prenom" name="prenom" >
                    </div>
                    <div class="form-group">
                        <label for="">Date de Naissance (*)</label>
                        <input required type="date" class="form-control" id="dateNaissance" name="dateNaissance" >
                    </div>
                    <div class="form-group">
                        <label for="">Adresse </label>
                        <input type="text" class="form-control" id="adresse" name="adresse">
                    </div>

                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Lieu de Naissance </label>
                        <input  type="text" class="form-control" id="lieuNaissance" name="lieuNaissance">
                    </div>
                    <div class="form-group">
                        <label for="">Téléphone (*)</label>
                        <input  required type="text" class="form-control" id="telephone" name="telephone" >
                          <?php 
                          $telephone;
                          $telephone=($_POST["telephone"]);
                          $telephone=trim($telephone);
                          if(isset($_POST["telephone"])){
                if(preg_match("#^[77|76|78|70|33][0-9]{7}$#","$telephone"))
                    echo "le numero est valide";
                else
                     echo "le numero n'est pas valide";
                    }
                    ?> 

                    </div>

                    <div class="form-group">
                        <label for="">Classe </label>
                        <select name="classe" id="classe" class="form-control">
                            <option  value="0">-- Sélectionner une classe --</option>
                           <?php foreach($spe as $classe){ ?>
                                <option value="<?=$classe["idClasse"]?>"><?=$classe["libelleClasse"] ?> </option>                                
                            <?php  }?>
                
                      </select>
                        <p class="small text-danger" id="montantInscription"></p>
                    </div>
                    <div class="form-group">
                        <label for="">Année Académique </label>
                        <select name="annee" id="annee" class="form-control">
                            <option value="0">-- Sélectionner une année académique --</option>
                            <?php foreach($an as $annee){ ?>
                                <option value="<?=$annee["idannee"]?>"><?=$annee["libelleannee"] ?> </option>                                
                            <?php  }?>
                                
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-outline-primary btn-block mt-3" name="inscrire" id="inscrire" value="Inscription"/>
            <a href="etudiants.php" class="btn btn-outline-success btn-block mt-3">Liste des etudiants</a>
    </div>
    <script src="assets/js/myScript.js"></script>
</body>
</html>