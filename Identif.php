<?php

require_once './Include/Securite.inc.php';

if (isset($_POST['btnSubmit'])) 
{
    if (valideInfosCompteUtilisateur($_POST['utiliId'], $_POST['pwdUtilisateur'])) 
    {
        header('Location: ./index.php?action=10');
        ouvreSessionUtilisateur($_POST['utiliId']);
    } 
    else 
    {
        echo '<p class="erreur">Utilisateur et/ou Mot de passe invalide</p>';
    }
}

?>

<?php

require_once './Include/entete2.inc.php';
require_once './Include/SourceDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';

?>	

<form id="frmIdentification" name="frmIdentification" method="post" action="index.php">	
    
<?php

echo formInputText('Utilisateur  ', 'utiliId', 'utiliId', '', 50, 40, 10, false, true) . '<br/>';
echo formInputPassword('Mot de passe  ', 'pwdUtilisateur', 'pwdUtilisateur', '', 50, 40, 20, true) . '<br/>';
//formInputHidden('action', 'action', $value);
echo formBoutonSubmit('btnSubmit', 'btnSubmit', 'Valider', 30) . '<br/>';

?>

</form>
