<?php include("static/header.php") ; 
session_start();
if ( ! isset($_GET["id"])){
  header("location:index.php");
}

$link=mysqli_connect("localhost","root","","student",3306);

$id=$_GET["id"];
$error=[];
// for students login
if(isset($_POST["btn-enter"])){
  $class=$_GET["id"];
  $_SESSION["email"]=$_POST["email"];
  $_SESSION["password"]=$_POST["password"];
  $email=$_SESSION["email"];
  $password=$_SESSION["password"];
  $select="select * from students where email='$email' and password='$password' ";
  $query=mysqli_query($link,$select);
  $check=mysqli_num_rows($query);
  // echo $check; 
  // if($id_group==1 || $id_group==2 || $id_group==3 ){
    

    if($check>0){
      header("location:$class.php");
    }else{
       array_push($error," الايميل والرقم السري غير متاح لهم بالدخول ") ;
    }



}
//end for students login


  
?>


<div class="header">
    <form  method="post" action="login.php?id=<?=$id?>" class="form p-5">

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

<!-- error -->
<?php if(isset($_POST["btn-enter"])) : ?>
<div class=" text-center alert alert-danger" role="alert">

  <?php foreach($error as $x) : ?>
    <h3 class="text-black"><?=$x ?></h3>
    <?php endforeach  ?>
  </div>
<?php endif ?>
<!-- error -->



<?php include("static/footer.php") ;  ?>