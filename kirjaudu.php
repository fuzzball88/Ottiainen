<!DOCTYPE html>
<!DOCTYPE html>
<?php include_once 'inc/top.php';?>
<!--//$_SESSION["tunnus"] Tarvitaan käyttäjätunnus sessiomuuttujaksi-->
<section class="py-5">
      <div class="container">
        <h1>Kirjaudu</h1>
        <p class="lead"> </p>
        <p>
        <style>
        label, button {
          display:block; 
        }
        </style>
        <form action="tarkasta.php" method="post">
            <label>Käyttäjätunnus:</label>
            <input name="tunnus" size="30" maxlength="30"><br/>
            <label>Salasana:</label>
            <input name="salasana" type="password" size="30" maxlength="30"><br/>
            <input type="submit" value="Kirjaudu">
        </form>
    </div>
</div>
</section>
<?php include_once 'inc/bottom.php';?>
