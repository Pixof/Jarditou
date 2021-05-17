
<?php 
$title = "Jarditou - Page de connexion";
include '../Include_/Header_A.php';
?>

 <!-- zone de connexion -->
 <form action="confirm.php" method="POST"> 

    <div  class="row">

        <div class="member col text-center">
            <h4 >J'ai déjà un compte</h4>
           <br>
    
            <div class="form-group ">
                <label for="exampleFormControlInput1">Mon adresse email</label>
                <input type="email" class="form-control text-center col-md-6 ml-auto mr-auto" required pattern="^[A-Za-z]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$" name="email" placeholder="" >
            </div>

            <div class="form-group">
                <label for="inputPassword" >Mon mot de passe</label>
                <input type="password" name="password" class="form-control text-center col-md-6 ml-auto mr-auto" maxlength="25" minlength="6" id="inputPassword" placeholder="">
                <a class="formMessage text-dark small"  href="/DW 2021/Jarditou PHP V2/App/src/login/auth.php">Mot de passe oublié ?</a>
            </div>

            <div class="form-group">
                <input class="btn btn-dark btn-block btn-sm col-md-6 ml-auto mr-auto" type="submit" value="Me connecter">
            </div>
        </div>

        <div class="nomember col text-center">
            <h4 >Je n'ai pas encore de compte</h4>
            <br>
            <div class="form-group">
                <a href="/DW 2021/Jarditou PHP V2/App/src/register/register.php" class="btn btn-dark btn-block btn-sm col-md-6 ml-auto mr-auto" >Créer un compte </a>
            </div>
        </div>

    </div>
    <br>
</form>

<?php include '../Include_/Footer_B.php'; ?>