<?php
require_once './Include/SourceDonnees.inc.php';

session_start(); // Démarre une nouvelle session ou reprend la session existante

function valideInfosCompteUtilisateur($ID,$MDP)
{
    $compteValide = existeCompteVisiteur($ID,md5($MDP));
    return $compteValide;
}

function ouvreSessionUtilisateur($identifiant)
{
    
    $infos = getInfoUser($identifiant);
    $resultat = $infos->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['utilId'] = $identifiant;
    $_SESSION['userNOM'] = $resultat['VIS_NOM'];
    $_SESSION['userPRENOM'] = $resultat['VIS_PRENOM'];
    $_SESSION['userVILLE'] = $resultat['VIS_VILLE'];
    //$_SESSION['userROLE'] = $resultat['VIS_ROLE'];
    //$_SESSION['userREGION'] = $resultat['VIS_REGION'];
}

function estSessionUtilisateurOuverte()
{
    return isset($_SESSION['utilId']);
}

function fermeSessionUtilisateur()
{
    session_destroy();
}

?>
