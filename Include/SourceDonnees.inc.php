<?php

function SGBDConnect() //Connexion à la base de  données
{
    try {
       $connexion = new PDO('mysql:host=localhost;dbname=gsb', 'PPEgsb','gsb');
       $connexion->query('SET NAMES UTF8');
       $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
    } catch (PDOException $e) {
        echo 'Erreur !: ' . $e->getMessage() . '<br />';
        exit();
    }
    return $connexion;
}

function getListePraticiens() // Numéro et prénom de tous les praticiens
{
    $connexion = SGBDConnect();
    
    $requete = 'SELECT PRA_NUM, concat(PRA_NOM, " ", PRA_PRENOM) as nomPrenom ' .
               'FROM praticien ' .
               'ORDER BY nomPrenom ';
    $resultat = $connexion->query($requete);
    
    return $resultat;
}

function getInfosPraticien($numPraticien) // Retourne les infos du praticiens passé en paramètre
{
    $connexion = SGBDConnect();
    
    $requete = 'SELECT PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_VILLE, PRA_COEF, TYP_LIEU '
            . 'FROM praticien P '
            . 'inner join type_praticien TP '
            . 'ON P.PRA_TYPE = TP.TYP_CODE '
            . 'WHERE PRA_NUM = ' . $numPraticien;
    
    $resultat = $connexion->query($requete);
    $resultat->setFetchMode(PDO::FETCH_ASSOC);
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    
    return $ligne;
}

function getListeFamilleMed() // Retourne les familles de Médicaments
{
    $connexion = SGBDConnect();

    $requete = 'SELECT FAM_CODE, FAM_LIBELLE ' .
               'FROM famille ' .
               'ORDER BY FAM_LIBELLE ';
    $resultat = $connexion->query($requete);

    return $resultat;
}

function getListeMed($codeFam) // Retourne les noms des médicaments dont la famille est passé en paramètre 
{
    $connexion = SGBDConnect();
    
    $requete= 'SELECT MED_CODE, MED_NOM '
            . 'FROM medicament '
            . 'WHERE MED_FAMILLE = "' . $codeFam . '"';
    $resultat =$connexion->query($requete);
    return $resultat;
}

function getInfoMed($codeMed) // Retourne les infos du médicament passé en paramètre
{
    $connexion = SGBDConnect();
    
    $requete = 'SELECT MED_CODE, MED_NOM, LAB_NOM, MED_COMPO, MED_EFFETS, MED_CONTREINDIC '
            . 'FROM medicament M '
            . 'inner join laboratoire L '
            . 'ON M.MED_LABO = L.LAB_CODE '
            . 'WHERE MED_CODE = "' . $codeMed . '"';
    $resultat = $connexion->query($requete);
    
    return $resultat;
}

function existeCompteVisiteur($user, $mdp)
{
    $connexion = SGBDConnect();
    $requete = 'SELECT VIS_CODE, VIS_PASSE ' .
    'FROM visiteur ' .
    'WHERE VIS_CODE = "'. $user .'" AND VIS_PASSE = "'. $mdp .'"';
    $resultat = $connexion->query($requete);
    return ($resultat->rowCount() == 1);
}

function recupMEDICAMENT($codeMed) //
{
    $connexion = SGBDConnect();
    
    $requete = 'SELECT MED_CODE, MED_NOM, LAB_NOM, MED_COMPO, MED_EFFETS, MED_CONTREINDIC '
            . 'FROM medicament M '
            . 'inner join laboratoire L '
            . 'ON M.MED_LABO = L.LAB_CODE '
            . 'WHERE MED_CODE = "' . $codeMed . '"';
    $reponse = $connexion->query($requete);
    $resultat=$reponse->fetch(PDO::FETCH_ASSOC);
    
    return formInputText("NOM COMMERCIAL ", "MED_NOM", "MED_NOM", $resultat["MED_NOM"], 50, 50, 30, true) . " <br/>\n"
        . formTextArea("COMPOSITION ", "MED_COMPO", "MED_COMPO", $resultat["MED_COMPO"], 50, 5, 255, 40, true) . " <br/>\n"
        . formTextArea("EFFETS ", "MED_EFFETS", "MED_EFFETS", $resultat["MED_EFFETS"], 50, 5, 255, 50, true) . " <br/>\n"
        . formTextArea("CONTRE INDIC ", "MED_CONTREINDIC", "MED_CONTREINDIC", $resultat["MED_CONTREINDIC"], 50, 5, 255, 60, true) 
        . " <br/>\n"
        . formInputText("LABORATOIRE ", "LAB_NOM", "LAB_NOM", $resultat["LAB_NOM"], 50, 50, 70, true) . " <br/>\n";
}

function getInfoUser($utilisateur) // Retourne les infos du médicament passé en paramètre
{
    $connexion = SGBDConnect();
    
    $requete = 'SELECT VIS_NOM, VIS_PRENOM, VIS_VILLE '
            . 'FROM visiteur '
            . 'WHERE VIS_CODE = "' . $utilisateur . '"';
    $resultat = $connexion->query($requete);
    return $resultat;
}

?>
