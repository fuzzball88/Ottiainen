<?php
include_once 'inc/top.php';

$snimi = filter_input(INPUT_POST, 'snimi',FILTER_SANITIZE_STRING);
$enimi = filter_input(INPUT_POST, 'enimi',FILTER_SANITIZE_STRING);
//$yritys = filter_input(INPUT_POST, 'yritys',FILTER_SANITIZE_NUMBER_INT);
$yritys = 1;
$puh = filter_input(INPUT_POST, 'puh',FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
$osoite = filter_input(INPUT_POST, 'osoite',FILTER_SANITIZE_STRING);
$postinro = filter_input(INPUT_POST, 'postinro',FILTER_SANITIZE_NUMBER_INT);
$postitmp = filter_input(INPUT_POST, 'postitmp',FILTER_SANITIZE_STRING);
$kirtunnus = filter_input(INPUT_POST, 'kirtunnus',FILTER_SANITIZE_STRING);
$kirsalasana = filter_input(INPUT_POST, 'kirsalasana',FILTER_SANITIZE_STRING);


try {
    $tietokanta->beginTransaction();
    $sql = "insert into HENKILO (snimi,enimi, yritys, puh, email, osoite, postinro, postitmp, kirtunnus, kirsalasana)
        values (:snimi,:enimi, :yritys, :puh, :email, :osoite, :postinro, :postitmp, :kirtunnus, :kirsalasana);";

    $kysely = $tietokanta->prepare($sql);
    $kysely->bindValue(':snimi',$snimi,PDO::PARAM_STR);
    $kysely->bindValue(':enimi',$enimi,PDO::PARAM_STR);
    $kysely->bindValue(':yritys',$yritys,PDO::PARAM_INT);
    $kysely->bindValue(':puh',$puh,PDO::PARAM_STR);
    $kysely->bindValue(':email',$email,PDO::PARAM_STR);
    $kysely->bindValue(':osoite',$osoite,PDO::PARAM_STR);
     $kysely->bindValue(':postinro',$postinro,PDO::PARAM_INT);
    $kysely->bindValue(':postitmp',$postitmp,PDO::PARAM_STR);
    $kysely->bindValue(':kirtunnus',$kirtunnus,PDO::PARAM_STR);
    $kysely->bindValue(':kirsalasana',$kirsalasana,PDO::PARAM_STR);

    
    $kysely->execute();

    $asiakas_id = $tietokanta->lastInsertId();

    $sql = "insert into TILAUS (tilaus_id, astunnus, yritys_astunnus, tilauspvm, tila) 
    values (:tilaus_id, :astunnus, :yritys_astunnus, :tilauspvm, :tila)";
    $kysely = $tietokanta->prepare($sql);
    $kysely->bindValue(':tilaus_id',$asiakas_id,PDO::PARAM_INT);
    $kysely->bindValue(':astunnus',$astunnus,PDO::PARAM_INT);
    $kysely->bindValue(':yritys_astunnus',$yritys_astunnus,PDO::PARAM_INT);
    $kysely->bindValue(':tilauspvm',$tilauspvm,PDO::PARAM_INT);
    $kysely->bindValue(':tila',$tila,PDO::PARAM_STR);
    $kysely->execute();

    $tilaus_id = $tietokanta->lastInsertId();
/*var_dump($_SESSION['ottiainen']); */
    

    foreach ($_SESSION['ostoskori'] as $tuote_id) {
        $sql = "insert into TILAUSRIVI (tilaus_id, tilausrivi, tuote, kilomaara) "
                . "values (:tilaus_id,:tilausrivi, :tuote, :kilomaara)";
        $kysely = $tietokanta->prepare($sql);
        $kysely->bindValue(':tilaus_id',$tilaus_id,PDO::PARAM_INT);
        $kysely->bindValue(':tilausrivi',$tilausrivi,PDO::PARAM_INT);
        $kysely->bindValue(':tuote',$tuote,PDO::PARAM_INT);
        $kysely->bindValue(':kilomaara',$kilomaara,PDO::PARAM_INT);
        $kysely->execute(); 
    }

    unset($_SESSION['ostoskori']);
    $tietokanta->commit();
    print "<p>Kiitos tilauksestasi!</p>";
}
catch (Exception $ex) {
    $tietokanta->rollback();
    print "<p>Häiriö verkkokaupassa, tilausta ei voitu tallentaa. " . $ex->getMessage()  . "</p>";
}
include_once 'inc/bottom.php';
?>