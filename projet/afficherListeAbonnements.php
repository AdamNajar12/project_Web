<?php
	include 'abonnementC.php';
	//$abonnementC=new AbonnementC();
	//$listeAbonnements=$abonnementC->afficherabonnement(); 
  
  $connection = config::getConnexion();
  $sql = 'SELECT count(id) as cpt  FROM abonnement';
  $statement = $connection->prepare($sql);
  $statement->execute();
  $nbrarticle = $statement->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['page'])){
  $page=(int)$_GET['page'] ;
  }else{
  $page=1;
  }
  $nbr_ele_par_page=3;
  $nbr_page=ceil($nbrarticle[0]['cpt']/$nbr_ele_par_page);
  $debut=$nbr_ele_par_page*($page-1);
  
  
  $sql = 'SELECT * FROM abonnement LIMIT :debut,:nbr_ele_par_page; ';
  $statement = $connection->prepare($sql);
  $statement->bindValue(':debut' ,$debut , PDO::PARAM_INT);
  $statement->bindValue(':nbr_ele_par_page' , $nbr_ele_par_page , PDO::PARAM_INT);
  
  
  
  $statement->execute();
  $listeAbonnements= $statement->fetchAll(PDO::FETCH_OBJ);









?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="GESTION CONCERTS">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />

    <style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #4D4D4D;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  margin: 0 4px;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {background-color: #ddd;}










</style>
    <title>GESTION Abonnements</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Accueil.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.8.2, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/277826578_727709038594036_95418314771093071_n-removebg-preview-15.png"
}
</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Accueil">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body u-xl-mode"><header class="u-clearfix u-grey-70 u-header u-header" id="sec-ab0a"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a class="u-image u-logo u-image-1" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview.png" class="u-logo-image u-logo-image-1">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-2" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-7.png" class="u-logo-image u-logo-image-2">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-3" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-9.png" class="u-logo-image u-logo-image-3">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-4" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-8.png" class="u-logo-image u-logo-image-4">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-5" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-8.png" class="u-logo-image u-logo-image-4">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-6" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-8.png" class="u-logo-image u-logo-image-4">
        </a>
        <div class="navbar">
  <a class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1"  href="afficherListeAbonnements.php">Abonnement</a>
  <a class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1" href="afficherListePacks.php">Pack</a>
  <a class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1" href="statistiques.php">TRI</a>
  <a class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1" href="http://localhost/projet/shearch_pack.php">recherche des abonnements</a>
</div>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-38e4">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-center u-text u-text-default u-text-1">tables Abonnements</h1>
        <a href="ajouter_abonnement.php" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1">ajouter</a>
        <div >
        <div class="u-expanded-width u-table u-table-responsive u-table-1">
          <table class="u-table-entity">
            <colgroup>
              <col width="20%">
              <col width="20%">
              <col width="20%">
              <col width="20%">
              <col width="20%">
            </colgroup>
            <thead class="u-black u-table-header u-table-header-1">
              <tr style="height: 21px;">
                <th class="u-border-1 u-border-black u-table-cell">ID</th>
                <th class="u-border-1 u-border-black u-table-cell">date debut</th>
     
                <th class="u-border-1 u-border-black u-table-cell">date_fin</th>
               
                <th class="u-border-1 u-border-black u-table-cell">Prix</th>
          
              </tr>
            </thead>
<tbody  class="u-table-body">
			<?php
				foreach($listeAbonnements as $abonnement){
			?>
			<tr style="height: 75px;">
				<td class="u-border-1 u-border-grey-30 u-table-cell"><?php echo $abonnement->id; ?></td>
				<td class="u-border-1 u-border-grey-30 u-table-cell"><?php echo $abonnement->date_debut; ?></td>
				<td class="u-border-1 u-border-grey-30 u-table-cell"><?php echo $abonnement->date_fin; ?></td>
				<td class="u-border-1 u-border-grey-30 u-table-cell"><?php echo $abonnement->prix; ?></td>
			
       
				<td class="u-border-1 u-border-grey-30 u-table-cell">
        <form method="POST" action="modifierabonnement.php">
						<input  type="submit" name="Modifier" value="Modifier" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1"       >
						<input type="hidden" value=<?PHP echo $abonnement->id; ?> name="id">
					</form>
				</td>
				<td class="u-border-1 u-border-grey-30 u-table-cell">
					<a href="supprimerabonnement.php?id=<?php echo $abonnemen->id; ?>" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1">SUPPRIMER</a>
				</td>
			</tr>
			<?php
				}
			?>
      </tbody>
		</table>
          </div>
          </div>

         
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                <div class="pagination">
                                        <?php
                                       
                                        for($i=1 ; $i<=$nbr_page ; $i++) : ?>
                                   <a class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-custom-color-1 u-hover-black u-text-black u-text-hover-white u-btn-1"  href="?page=<?= $i?>"><?php echo $i ?></a>
                                          <?php  endfor ?>
                                        </div>
                                </nav>
                         
                   
    </section>
 
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-3a6b"><div class="u-align-left u-clearfix u-sheet u-sheet-1">
        <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-6.png" class="u-logo-image u-logo-image-1">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-2" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-13.png" class="u-logo-image u-logo-image-2">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-3" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-9.png" class="u-logo-image u-logo-image-3">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-4" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-10.png" class="u-logo-image u-logo-image-4">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-5" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-14.png" class="u-logo-image u-logo-image-5">
        </a>
        <a href="https://nicepage.com" class="u-image u-logo u-image-6" data-image-width="436" data-image-height="572">
          <img src="images2/277826578_727709038594036_95418314771093071_n-removebg-preview-12.png" class="u-logo-image u-logo-image-6">
        </a>
      </div></footer>
  </body>
</html>