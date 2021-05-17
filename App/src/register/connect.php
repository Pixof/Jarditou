<?php
require '../config BDD/connect_base.php';
echo var_dump($user);
echo var_dump($sth);
echo var_dump($_POST); 
echo var_dump( $error['email']);

    if (isset($_POST['firstname'])) {
        $firstname = $_POST['firstname'];
    }
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
    }
    if (isset($_POST['dateBirthday'])) {
        $dateOfB = $_POST['dateBirthday'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }
    // variable par défaut pour définir le role et la date d'inscription du jour
    $date = date('y-m-d');
    $role = 1;

  
    try
    {
      //On se connecte à la BDD
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      //On insère les données reçues si les champs sont remplis
    if(!empty($firstname) && !empty($lastname) && !empty($dateOfB) && !empty($email) && !empty($pw))
    {
    $sth = $dbco->prepare("
        INSERT INTO user(firstname, lastname, dateOfBirthday,email, password, dateOfInscription, role_id )
        VALUES(:firstname, :lastname, :dateBirthday, :email, :password, :date, :role)");
    $sth->bindParam(':firstname',$firstname);
    $sth->bindParam(':lastname',$lastname);
    $sth->bindValue(':dateBirthday',$dateOfB);
    $sth->bindParam(':email',$email);
    $sth->bindParam(':password',$pw);
    $sth->bindParam(':date',$date);
    $sth->bindParam(':role',$role);
    $sth->execute();
    }
    echo '<br>';
    }   

    catch(PDOException $e)
    {
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
        die("fin");
    }
  


?>
