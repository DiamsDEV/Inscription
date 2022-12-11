<?php
    /*
        Ici, vous mettez la connexion de
        InscriptionApp à la base de données.
        Vous créez une base de données nommée : inscription_app
        avec les tables suivantes :
        annee(id(auto_increment), libelle(UNIQUE))
        classe(id(auto_increment),code(UNIQUE),libelle(UNIQUE),montantInscription)
        etudiant(id(auto_increment),matricule(UNIQUE),nom,prenom,dateNaissance,lieuNaissance,telephone,adresse)
        inscription(id(auto_increment),dateInscription,idEtudiant,idClasse,idAnnee)
    */
     
    require_once 'config.php';
    try {
        $db = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                )
            );
    } catch (PDOException $e) {
        die('Erreur de connexion à la base de données !');
        //die($e->getMessage());
    }
?>
