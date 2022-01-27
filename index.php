<?php
// here admin login if you want students login go to login.php
session_start();
include("static/header.php");

// for admins login
$link=mysqli_connect("localhost","root","","student",3306);
if(isset($_POST["btn-enter"])){
    $_SESSION["email-admin"] =$_POST["email"];
    $_SESSION["password-admin"] =$_POST["password"];
    $email=$_SESSION["email-admin"];
    $password=$_SESSION["password-admin"];
    $select="select * from admin where email='$email' and password='$password'";
    $query=mysqli_query($link,$select);
    $check=mysqli_num_rows($query);
    if($check>0){
        header("location:admin.php");
    }else{
        header("location:index.php");
    }
}
// end for admins login


?>
<link rel="stylesheet" href="css-pro/index.css">
<section class="header">

<?php if( !isset($_GET["admin"])) :?>
    <div class="container">
        <div class="chose">
                
            <form  method="get">
    <a  type="submit" href="login.php?id=1st" class=" font-weight-bold fs-5 mx-lg-2 mx-sm-0 my-2  btn1 btn-primary"> اولي </a>
    <a  type="submit" href="login.php?id=2st" class=" font-weight-bold fs-5 mx-lg-2 mx-sm-0 my-2  btn1 btn-primary"> ثانيه </a>
    <a  type="submit" href="login.php?id=3st" class=" font-weight-bold fs-5 mx-lg-2 mx-sm-0 my-2  btn1 btn-primary"> التالته </a>
    <a  href="index.php?admin" type="submit" name="admin" class="font-weight-bold fs-5  mx-lg-2 mx-sm-0 my-2  btn1 btn-primary"> المشرفين </a>
            </form>

        </div>
    </div>

<?php  endif ?>

<?php if(isset($_GET["admin"])) :?>
    <form  method="post"  class="form p-5">

        <div class="text-center mb-5" style=" font-size: 20px; font-weight: bold; color: red;">

        </div>

        <!-- email -->
        <div class="form-outline mb-4">
            <input  required name="email" type="email" id="form1Example1" class="form-control" />
            <label class="form-label" for="form1Example1">Email address</label>
        </div>
        <!-- email -->
     
        <!-- password -->
        <div class="form-outline mb-4">
            <input  required name="password" type="password" id="form1Example2" class="form-control" />
            <label class="form-label" for="form1Example2">Password</label>
        </div>
        <!-- password -->


        
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <div class="form-check">
           <input
             class="form-check-input"
                type="checkbox"
             value=""
             id="form1Example3"
             checked
           />
           <label class="form-check-label" for="form1Example3"> Remember me </label>
           </div>
          </div>
      
          <!-- <di class="co   > -->
    
        <!-- Submit button -->
        <button  name="btn-enter" type="submit" class="btn1 btn-primary btn-block">Sign in</button>
      </form>
</div>

<?php  endif ?>
</section>






<script src="js-pro/index.js"></script>
<?php
include("static/footer.php");
?>