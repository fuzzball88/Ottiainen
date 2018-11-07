<?php include_once "inc/top.php";?>
<?php


$tunnus=filter_input(INPUT_POST, "tunnus",FILTER_SANITIZE_STRING);
$salasana=filter_input(INPUT_POST, "salasana",FILTER_SANITIZE_STRING);
//$tyyppi=filter_input(INPUT_POST, "tyyppi",FILTER_SANITIZE_STRING);
$sql="SELECT id,kirtunnus,kirsalasana,tyyppi FROM HENKILO where '$tunnus'=kirtunnus AND '$salasana'=kirsalasana";

$kysely = $tietokanta->query($sql);
        $tietue = $kysely->fetch();

if ($tunnus==$tietue["kirtunnus"] && $salasana==$tietue["kirsalasana"] && $tietue["tyyppi"]=="ostaja") {
//    $_SESSION['kirjautunut']=true;
    $_SESSION["tyyppi"]="ostaja";
    $_SESSION["tunnus"]=$tietue["id"];
    header("location: ostaja.php");
}

else if ($tunnus==$tietue["kirtunnus"] && $salasana==$tietue["kirsalasana"] && $tietue["tyyppi"]=="kasvattaja") {
//    $_SESSION['kirjautunut']=true;
    $_SESSION["tyyppi"]="kasvattaja";
    $_SESSION["tunnus"]=$tietue["id"];
    header("location: kasvattaja.php");
}

else if ($tunnus==$tietue["kirtunnus"] && $salasana==$tietue["kirsalasana"] && $tietue["tyyppi"]=="tyontekija") {
//    $_SESSION['kirjautunut']=true;
    $_SESSION["tyyppi"]="tyontekija";
    header("location: tyontekija.php");
}
else {
print"<h3>VIRHE</h3>";
    
}
?>

<?php include_once "inc/bottom.php";?>