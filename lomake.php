<?php include_once 'inc/top.php';?>

    
    <!-- Content section -->
    <section class="py-5">
      <div class="container">
        <h1>Ota yhteyttä</h1>
        <p class="lead"> </p>
        <p>
        <style>
        label, button {
          display:block; 
        }
        </style>
        <form action="lomakelah.php" method="post">
        <label>Nimi</label>
        <input type="text" name="nimi" maxlength="50">
        <label>Sähköposti</label>
        <input type="text" name="sahkoposti" maxlength="50">
        <label>kirjoita viesti</label>
        <textarea name="teksti"></textarea>
        <button>Lähetä</button>
        </form>
        </p>
      </div>
    </section>

    

    <!-- Content section -->
   <!-- <section class="py-5">
      <div class="container">
        <h1>Hyönteisproteiinin kasvatus pohjoisen maatiloilla</h1>
        <p class="lead">Autamme paikallisista maatalousyrittäjistä hyönteisfarmaajia</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
      </div>
    </section> -->

  
<?php include_once 'inc/bottom.php';?>