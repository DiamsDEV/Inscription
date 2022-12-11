<?php
       /* 1. getClasses():c'est une fonction qui
        retourne toutes les classes dans l'ordre
        croissant sur le libelle */ 
    function getClasses()
    {
        global $db;
        $sql = "SELECT * FROM classe ORDER BY libelleClasse";
        $resultat = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);//query execute une requete sql en appelant une seule fonction
        return $resultat;
        /*global $db;
        $req = $db->query("SELECT * FROM classe");
        $spe = $req-> fetchAll();
        return $spe;*/
    }


    /*2. getAnnees():c'est une fonction qui
        retourne toutes les années académiques
        contenant l'année en cours.*/

    function getAnnees(){
        global $db;
        $annee = date('Y');
        $sql = " SELECT * FROM annee WHERE  libelleannee LIKE '%$annee%'  " ;
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }


    /*3. getEtudiants():c'est une fonction qui
        retourne tous les étudiants dans l'ordre
        croissant sur le nom.accordion.*/
    function getEtudiants()
    {
        global $db;
        $sql = "SELECT * FROM `etudiant`, `classe` WHERE `etudiant`.`idClasse` = `classe`.`idClasse` ORDER BY nometudiant ASC";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        //pdo: nous permet d'acceder à la base de donnée
        //where: nous permet de faire une modification selectionner dans mysql 
    }

    /*4. addEtudiant():c'est une fonction qui
        insére les informations de l'étudiant dans 
        une table nommée etudiant et les informations
        de l'inscription dans une table nommée 
        inscription*/

        function nbetudiants(){
        global $db;
        $sql = "SELECT COUNT(*) as nbEtu FROM etudiant";
        return $db->query($sql)->fetch();
    }


        function generermatricule($nbEtu){ 
        $nbEtu=intval($nbEtu);
        //permet de retouener la valeur entiere de la variable.
        $mat="ET-".date('Ymd')."-#".($nbEtu+1);
        return $mat;
    }

    
        function addEtudiant($matricule,$nom,$prenom,$dateNaissance,$telephone,$adresse,$classe,$annee){
        global $db;
        $matricule=generermatricule(nbetudiants()['nbEtu']);
        $sql = "INSERT INTO etudiant (idetudiant,matriculeetudiant,nometudiant,prenometudiant,dateNaissance,telephone,adresse,idClasse) VALUES(null,'$matricule','$nom','$prenom','$dateNaissance',$telephone,'$adresse',$classe)"; 
        if($db->exec($sql)){

           //retour le contenu de la variable mais ne l'affiche pas.
           $etu   = $db->lastInsertId();
           $day = date('Y-m-d') ;
           $sql   = "INSERT INTO inscription VALUES(null,'$day',$etu,$classe,$annee)";
         return $db->exec($sql);

        }
    }

?>