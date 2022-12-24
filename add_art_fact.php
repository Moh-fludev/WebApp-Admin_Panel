<?php
session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {  
?>
<?php  
       $id_fact = $_GET['id_fact'];
      include('model/database.php');
      include('model/crud.php');
      $db = db_connect();
      $facture_get_one =facture_get_one($db,$id_fact)->fetch(PDO::FETCH_ASSOC);
      $client_get_one =client_get_one($db,$facture_get_one['id_client'])->fetch(PDO::FETCH_ASSOC);
      $list_article = article_list($db);
      $list_fact_ar = facture_list_art($db,$id_fact);
      $counte = $list_fact_ar -> rowcount();
      $list_calc_mon = facture_list_art($db,$id_fact);
      $montant =0.00;
      foreach($list_calc_mon as $total){
        $montant = $montant+ $total['pu_fact']*$total['qte_fact'];
       
    } 
    facture_update_montant($db,$id_fact,$montant);
?>
    <?php
    include('layout/header.php')
    ?>
    <?php
    include('layout/nav.php')
    ?>
    <div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="row g-3 mb-4 align-items-center justify-content-between">
      <div class="col-auto">
      <h1 class="app-page-title mb-0">Dashboard / Facture</h1>
      
      </div>

      </div>
      <div class="form-row">
     
    <div class="form-group ">
      <label>Date</label>
      <input readonly type="date" name="date" class="form-control"  placeholder="Date" value="<?php echo $facture_get_one['date_fact']?>">
    </div>
    <div class="form-group">
      <label >Code Facture</label>
      <input readonly type="text" class="form-control" id="inputEmail4" placeholder="Code" value="<?php echo $facture_get_one['code_fact']?>">
    </div>
    
    <div class="form-group col-md-2">
    <label >Client</label>
      <input readonly type="text" class="form-control" id="inputEmail4" value="<?php echo  $client_get_one['nom_client'] ?> <?php echo  $client_get_one['prenom_client'] ?>">
    </div>
  </div>
     
        <form action="model/save_fact_add_ar.php" method="POST">  
  <div class="form-row">
  <div class="form-group col-md-1">
      <label >Id Facture</label>
      <input readonly name="id_fact" type="number" value="<?php echo $facture_get_one['id_fact'] ?>" class="form-control" id="inputEmail4">
    </div>
  <div class="form-group col-md-4">
      <label for="inputState">Article</label>
      <select name="id_ar" id="inputState" class="form-control">
        <option selected>Choose...</option>
        <?php foreach($list_article as $article){?>
            <option value="<?php echo $article['id_ar']?>"><?php echo $article['disignation_ar']?></option>
            <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-1">
      <label >Quantiti</label>
      <input name="qte_fact" type="number" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-2">
      <label >Prix</label>
      <input name="prix_fact" type="number" class="form-control" id="inputEmail4" >
    </div>
   
  </div>
  <!-- <div class="form-row">
  <div class="form-group col-md-2">
      <label for="inputState">Type Payement</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
         <option value="1" >E_cheque</option>
         <option value="2" >Versemnt</option>
         <option value="3">Espess</option>

      </select>
    </div>
   
  </div> -->
  <div class="form_row">
  <button name="fact_add_ar" type="submit" class="btn app-btn-primary">Ajouter</button>
</form>
<a href="imprimi_fact.php?id_fact=<?php echo $id_fact ?>"> <button  type="button" class="imp btn app-btn-primary">Impriment</button></a>
<a href="facturation.php"><button  type="button" class="saufg btn app-btn-primary">Save Change</button></a>
  </div>
 
<div class="tab-content" id="orders-table-tab-content">
			<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			<div class="app-card app-card-orders-table shadow-sm mb-5">
				<div class="app-card-body">
					
					<div class="table-responsive">
						<table class="table app-table-hover mb-0 text-left">
							<thead>
								<tr>
                <th class="cell">#</th>
									<th class="cell">Disigantion</th>
									<th class="cell">Prix</th>
									<th class="cell">Quantiti</th>
                  <th class="cell">Amount</th>
                  
								
									
								</tr>
							</thead>
							<tbody>
							<?php
							if($counte>0){
                $id_count= 0;
								foreach($list_fact_ar as $list_ar){
                  $amounte =  $list_ar['qte_fact']*$list_ar['pu_fact'];
									echo '<tr class="cell">';
									echo '<td class="cell">'.$id_count.'</td>';?>
									 <td class="cell"> 
                  <?php  $article_get_one = article_get_one($db,$list_ar['id_ar'])->fetch(PDO::FETCH_ASSOC);
                                         echo $article_get_one['disignation_ar']?>
                    </td>
									<?php 
                  echo '<td class="cell">'.$list_ar['pu_fact'].'.00 DA</td>';
									echo '<td class="cell">'.$list_ar['qte_fact'].'</td>';
                  echo '<td class="cell">'.$amounte.'.00 DA</td>'; 
								  ?>			
							<?php
			echo'</tr>';
      $id_count = $id_count+1;
			}}else{
				echo '<tr class="cell">';
									echo '<td class="cell"></td>';
									echo '<td class="cell"></td>';
									echo '<td class="cell"></td>';
									echo '<td class="cell">No Articles existes !!!!</td>';
									echo '<td class="cell"></td>';
									echo '<td class="cell"></td>';
				echo '</tr>'		;			
			}
			?>
								
							</tbody>
               
						</table>
					</div>
					<!--//table-responsive-->
				</div>
				<!--//app-card-body-->
				
			</div>
			<!--//app-card-->


			</div>
			<!--//tab-pane-->

			</div>
			<!--//tab-content-->
      <p>-------------------------------------------------------</p>
<table>
   <tfoot class="montant">                         
                                    <tr>
                                    <td></td>
                                      <td></td>
                                        <td colspan="2"></td>
                                        <td colspan="2">Total a paye :  </td>
                                        <td></td>
                                        <td> <?php echo $montant.'.00 DA' ?></td>
                                    </tr>
                                </tfoot>
</table>

</div>
      </div>
      <!-- Javascript -->
      <script src="public/plugins/popper.min.js"></script>
      <script src="public/plugins/bootstrap/js/bootstrap.min.js"></script>

      <!-- Page Specific JS -->
      <script src="public/js/app.js"></script>

      </body>

      </html>
      <?php
}
else {
  header('location: login.php');
  exit();
}
?>

