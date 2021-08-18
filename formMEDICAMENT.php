<?php

require_once './Include/entete.inc.php';
require_once './Include/SourceDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';

?>

<div id="bas">
    
    <h1> Pharmacopée </h1>
    
<?php

switch ($_REQUEST['action']) {
case 20:
            
?>
    
<form name="formChoixFamilleMedicaments" method="post" action="index.php">
    
<?php

        $selected = (isset($_REQUEST["listeFamilleMed"]) ? $_REQUEST["listeFamilleMed"] : 1);
        echo formSelectDepuisRecordset('Famille : ', 'listeFamilleMed', 'ListeFamMedicaments', getListeFamilleMed(), $selected, 10);
        echo formInputHidden("action", "action", 31);
        echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "20");

?>

</form>

<?php

break;
case 31:
            
?>

<form name="formChoixFamilleMedicaments" method="post" action="index.php">
    
<?php
        
$selected = (isset($_REQUEST["listeFamilleMed"]) ? $_REQUEST["listeFamilleMed"] : 1);
                
echo formSelectDepuisRecordset('Famille : ', 'listeFamilleMed', 'ListeFamMedicaments', getListeFamilleMed(), $selected, 10);
echo formInputHidden("action", "action", 31);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "20");

?>
    
</form>
    
<form name="formChoixMedicament" method="post" action="index.php">
               
<?php

$selectedList = (isset($_REQUEST["listeMed"]) ? $_REQUEST["listeMed"] : 1);

echo formSelectDepuisRecordset('Médicament : ', 'listeMed', 'ListeMedicaments', getListeMed($selected), $selectedList, 11);
echo formInputHidden("famille", "famille", $selected);
echo formInputHidden("action", "action", 32);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "21");
                
?>

</form>

<?php
            
break;
        
case 32:
            
    $selected = $_REQUEST["famille"];
            
?>
            
<form name="formChoixFamilleMedicaments" method="post" action="index.php">
                
<?php
   
echo formSelectDepuisRecordset('Famille : ', 'listeFamilleMed', 'ListeFamMedicaments', getListeFamilleMed(), $selected, 10);
echo formInputHidden("action", "action", 31);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "20");
                
?>

</form>
           
    <form name="formChoixMedicament" method="post" action="index.php" >
               
<?php
               
$selectedList = (isset($_REQUEST["listeMed"]) ? $_REQUEST["listeMed"] : 1);
                
echo formSelectDepuisRecordset('Médicament : ', 'listeMed', 'ListeMedicaments', getListeMed($selected), $selectedList, 11);
echo formInputHidden("famille", "famille", $selected);
echo formInputHidden("action", "action", 32);
echo formBoutonSubmit("btnSubmit", "btnSubmit", "OK", "21");

?>
            
</form>

    <form id="formMedicament" name="formMedicament">
                
<?php
                
if (isset($_REQUEST["listeMed"])) {
                    
    echo recupMEDICAMENT($_REQUEST["listeMed"]);
                
}

?>
    </form>
<?php
        
break;
default:

break;
}

?>
    
</div>

<?php

require_once './Include/pied.inc.php';
       
?>