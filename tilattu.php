<?php
include_once 'inc/top.php';
?>
<style>
    label,button {display: block;}
</style>
<h3>Asiakkaan tiedot</h3>
<form action="tilaa.php" method="post">
    <label>Sukunimi</label>
    <input name="snimi" maxlength="50">
    <label>Etunimi</label>
    <input name="enimi" maxlength="50">
    <label>Yritys</label>
    <input name="yritys" maxlength="11">
    <label>Puhelinnumero</label>
    <input name="puh" maxlength="20">
    <label>Sähköposti</label>
    <input name="email"  maxlength="50">
    <label>Osoite</label>
    <input name="osoite"  maxlength="40">
    <label>Postinro</label>
    <input name="email" type="number"  maxlength="11">
    <label>Postitoimipaikka</label>
    <input name="postitmp"  maxlength="30">
     <label>Kirjautumistunnus</label>
    <input name="kirtunnus"  maxlength="10">
     <label>Kirjautumissalasana</label>
    <input name="Kirsalasana" type="password"  maxlength="10">
     <label>Tyyppi</label>
    <input name="tyyppi"  maxlength="10">
    <button>Tilaa</button>
</form>
<?php
include_once 'inc/bottom.php';
?>