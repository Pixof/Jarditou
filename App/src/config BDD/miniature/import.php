<?php
include '/Users/aurelienc/Desktop/AFPA_Jarditou/DW 2021/Jarditou PHP V2/App/src/Include_/Header_A.php';
session_start();
?>



<form action="upload.php" method="post" enctype="multipart/form-data">

        <h2>Upload Fichier</h2> 

        <div>
   <?php
      if(file_exists("config BDD/miniature/" . $_SESSION['id'] . "/" . $_SESSION['file']) && isset($_SESSION['file'])){
   ?>
      <img src="<?= "config BDD/miniature/" . $_SESSION['id'] .  "/" . $_SESSION['file']; ?>" width="120" style="width: 100%"/>
 
   <?php
      }else{
   ?>
      <img src="/DW 2021/Jarditou PHP V2/App/src/config BDD/miniature/11.jpg" width="120"/>
   <?php
      }
   ?>
        
        <label for="fileUpload">Fichier:</label>
        <input type="file" name="photo" id="fileUpload">
        <input type="submit" name="avatar" value="Upload">
        <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
    </form>
