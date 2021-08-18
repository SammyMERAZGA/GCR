<?php

require_once './Include/SourceDonnees.inc.php';
require_once './Include/Securite.inc.php';

//compte user : a131 u532YQf

if (isset($_REQUEST['action'])) // Le isset vérifie si une variable est déclarée et est différente de null
{
    if (estSessionUtilisateurOuverte())
{
switch ($_REQUEST['action']) 
{
    case 10:
        require_once './Include/entete.inc.php';
        break;
    case 30:
        require_once './Include/entete.inc.php';
        require_once './formPRATICIEN.php';
        break;
    case 20:
        require_once './Include/entete.inc.php';
        require_once './formMEDICAMENT.php';
        break;
    case 31:
        require_once './Include/entete.inc.php';
        require_once './formMEDICAMENT.php';
        break;
    case 32:
        require_once './Include/entete.inc.php';
        require_once './formMEDICAMENT.php';
        break;
    case 40:
        require_once './Include/entete.inc.php';
        require_once './formCR_VISITE.php';
    default:
        require_once './Identif.php';
}
}
}
else
{
    require_once './Identif.php';
}

require_once './Include/pied.inc.php';
