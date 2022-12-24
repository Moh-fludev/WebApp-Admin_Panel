
<?php  session_start();

if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {
 ?>
<?php
  $id = $_GET['id_fact'];
  include('model/database.php');
  include('model/crud.php');
   $db= db_connect();
   $facture_get_one =facture_get_one($db,$id)->fetch(PDO::FETCH_ASSOC);
   $client_get_one = client_get_one($db,$facture_get_one['id_client'])->fetch(PDO::FETCH_ASSOC);;
   $user_get_one = user_get_one($db,$_SESSION['usernameAdmin'],$_SESSION['passwordAdmin'])->fetch(PDO::FETCH_ASSOC);;
   $facture_list_ar = facture_list_art($db,$id);
		?>
		
 
<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Facture</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="public/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="public/css/portal.css">

</head> 

<body class="app app-404-page">   	
   
<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-9">
          <p style="color: #7e8d9f;font-size: 20px;">Info_Tech </p>
        </div>
        <div class="col-xl-3 float-end">
          <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
              class="fas fa-print text-primary"></i> Print</a>
          <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
              class="far fa-file-pdf text-danger"></i> Export</a>
        </div>
        <hr>
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="text-center">
            
            <h1 >Facture</h1>
          </div>

        </div>


        <div class="row">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted">Client: <span style="color:#5d9fc5 ;"><?php echo $client_get_one['nom_client'].' '.$client_get_one['prenom_client'] ?></span></li>
              <li class="text-muted">Telephone : <?php echo $client_get_one['tele_client'] ?></li>
              <li class="text-muted">Email :  <?php echo $client_get_one['email_client'] ?></li>
            </ul>
          </div>
          <div class="col-xl-4">
          
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">By: </span><?php echo $user_get_one['username_user'] ?></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Date: </span><?php echo $facture_get_one['date_fact'] ?></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  Unpaid</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;" class="text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Disigantion</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantiti</th>
                <th scope="col">Amount</th>
              </tr>
            </thead>
            <tbody>
            <?php
							$id_count = 0;
								foreach($facture_list_ar as $list_ar){

                                    $amounte =  $list_ar['qte_fact']*$list_ar['pu_fact'];
									echo '<tr class="cell">'?>
                                     <td class="cell"><?php echo $id_count ?></td>
									<td class="cell">
                                     <?php  $article_get_one = article_get_one($db,$list_ar['id_ar'])->fetch(PDO::FETCH_ASSOC);
                                     echo $article_get_one['disignation_ar']?>
                                    </td>
									<?php echo '<td class="cell">'.$list_ar['pu_fact'].' Da</td>';
									echo '<td class="cell">'.$list_ar['qte_fact'].'</td>';
									echo '<td class="cell">'.$amounte.'.00 Da</td>';
									
                                    echo '</tr>';
                                    $id_count = $id_count+1;
                                };
								?>
             
            </tbody>

          </table>
        </div>
        <div class="row">
          
          <div class="col-xl-3">
            <ul class="list-unstyled">
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$0</li>
            </ul>
            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                style="font-size: 25px;"><?php echo $facture_get_one['montant_fact']  ?>.00 DA</span></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-10">
            <p>Thank you for your purchase</p>
          </div>
          <div class="col-xl-2">
        
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
    


    <!-- Javascript -->          
    <script src="public/plugins/popper.min.js"></script>
    <script src="public/plugins/bootstrap/js/bootstrap.min.js"></script>  
    
    

    
    
    <!-- Charts JS -->
    <script src="public/plugins/chart.js/chart.min.js"></script> 
    <script src="public/js/charts-custom.js"></script> 
    
    <!-- Page Specific JS -->
    <script src="public/js/app.js"></script> 

</body>
</html> 

<?php  }else{
    header('location: login.php');
} ?>