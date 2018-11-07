<?php include_once 'inc/top.php';?>
<?php
session_start();
$tuote_ids = array();
//session_destroy();


if(filter_input(INPUT_POST, 'lisää_koriin')){
    if(isset($_SESSION['ostoskori'])){
        
        $count = count($_SESSION['ostoskori']);
        
        $tuote_ids = array_column($_SESSION['ostoskori'], 'id');
        
        if (!in_array(filter_input(INPUT_GET, 'id'), $tuote_ids)){
             $_SESSION['ostoskori'][$count] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'nimi' => filter_input(INPUT_POST, 'nimi'),
            'hinta' => filter_input(INPUT_POST, 'hinta'),
            'määrä' => filter_input(INPUT_POST, 'määrä')
            ); 
        }
        else {
            for ($i = 0; $i < count($tuote_ids); $i++){
                if ($tuote_ids[$i] == filter_input(INPUT_GET, 'id')){
                    
                    $_SESSION['ostoskori'][$i]['määrä'] += filter_input(INPUT_POST, 'määrä');
                }
                    
                
            }
        }
    }
   
    else { 
        $_SESSION['ostoskori'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'nimi' => filter_input(INPUT_POST, 'nimi'),
            'hinta' => filter_input(INPUT_POST, 'hinta'),
            'määrä' => filter_input(INPUT_POST, 'määrä')
        );
        
    }
}

if(filter_input(INPUT_GET, 'action') == 'delete'){
   foreach($_SESSION['ostoskori'] as $key => $tuote){
       if ($tuote['id'] == filter_input(INPUT_GET, 'id')){
           unset($_SESSION['ostoskori'][$key]);
       }
   }
   $_SESSION['ostoskori'] = array_values($_SESSION['ostoskori']);
}

//pre_r($_SESSION);

function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';

}
?>


<!DOCTYPE html>
<html>
    <head>
       
        <meta charset="UTF-8">
        <title>Ostoskori</title>
        
        <link rel="stylesheet" type="text/css" href="../tyyli.css" />
    </head>
    <body>
    
        <div class="container">
      <?php

$connect = mysqli_connect('localhost','n7pete00', '', 'ottiainen');
$query = 'SELECT * FROM TUOTE ORDER BY id ASC';
$result = mysqli_query($connect, $query);

if ($result):
    if(mysqli_num_rows($result)>0):
        while($tuote = mysqli_fetch_assoc($result)):
            ?>
            <div class="col-sm-4 col-md-3">
                <form method="post" action="ostoskori.php?action=add&id=<?php echo $tuote['id']; ?>">
                    <div class="card">
                        <img src="<?php echo $tuote['kuva']; ?>" class="img-responsive col-xs-12"/>
                        <h4 class="text-info"><?php echo $tuote['nimi']; ?></h4>
                        <h4>€ <?php echo $tuote['hinta'];?></h4>
                        <input type="text" name="määrä" class="form-control" value="1" />
                        <input type="hidden" name="nimi" value="<?php echo $tuote['nimi']; ?>" />
                        <input type="hidden" name="hinta" value="<?php echo $tuote['hinta']; ?>"  />
                        <input type="submit" name="lisää_koriin" class="btn btn-info"
                                value="Lisää ostoskoriin" />
                    </div>
                </form>
            </div>
            <?php
        endwhile;
    endif;
endif;

?> 
<div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h3>Tilauksen tiedot</h3></th></tr>   
        <tr>  
             <th width="40%">Tuotteen nimi</th>  
             <th width="10%">Määrä</th>  
             <th width="20%">Hinta</th>  
             <th width="15%">Yhteensä</th>  
             <th width="5%">Poisto</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['ostoskori'])):  
            
             $yhteensä = 0;  
        
             foreach($_SESSION['ostoskori'] as $key => $tuote): 
        ?>  
        <tr>  
           <td><?php echo $tuote['nimi']; ?></td>  
           <td><?php echo $tuote['määrä']; ?></td>  
           <td>€ <?php echo $tuote['hinta']; ?></td>  
           <td>€ <?php echo number_format($tuote['määrä'] * $tuote['hinta'], 2); ?></td>  
           <td>
               <a href="ostoskori.php?action=delete&id=<?php echo $tuote['id']; ?>">
                    <div class="btn-danger">Poista</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $yhteensä = $yhteensä + ($tuote['määrä'] * $tuote['hinta']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right">Yhteensä</td>  
             <td align="right">€ <?php echo number_format($yhteensä, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
           
            <td colspan="5">
             <?php 
                if (isset($_SESSION['ostoskori'])):
                if (count($_SESSION['ostoskori']) > 0):
             ?>
                <form action="tilaa.php" method="post">
                <a href="tilattu.php" class="button">Tilaa</a>
                </form>  
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>

        </div> 
     
    </body>
</html>
<?php include_once 'inc/bottom.php';?>