
<?php
session_start();

if(isset($_SESSION['userid'])){
require("./db.php");

$userid = $_SESSION['userid'];
if($userid){
            $message= 'your role is a guest';
        }

if(isset($_POST['edit'])){
    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $useremail = filter_var($_POST['useremail'],FILTER_SANITIZE_EMAIL);


    
    



    if(filter_var($useremail,FILTER_VALIDATE_EMAIL)){
        $sql= "SELECT * FROM users WHERE email= ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$useremail]);
        $totalusers = $stmt->rowCount();

        if($totalusers > 0){
            $emailtaken = "This email has already been taken<br>";
        }else{
            $sql= "UPDATE users SET name=?, email=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username,$useremail,$userid]);
        
        }
    }

    // header("location:http://localhost/img/index.php");

}



$stmt = $pdo->prepare('SELECT * FROM users WHERE id= ?');
$stmt->execute([$userid]);
$user = $stmt->fetch();
if($user->role === 'guest'){
            $message= 'your role is a guest';
        }




}else{
    header("location:login.php");
}


?>
<?php require("./inc/header.html");?>

<div class="container">
      <div class="card">
        <div class="card-header  bg-light mb-3">
          Update Profile
        </div>
        <div class="card-body">
          <form action="profile.php" method="post">

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required value="<?php echo $user->name; ?>">
            </div>
            <div class="form-group">
                <?php if(isset($emailtaken)){ ?>
                    <p style="color: red;"> <?php echo $emailtaken ?></p>
                <?php } ?>
                <label for="useremail">Email</label>
                <input type="email" name="useremail" class="form-control" required value="<?php echo $user->email; ?>">
            </div>
            
                <button type="submit" name="edit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>


<?php require("./inc/footer.html");?>


<script src="./bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  <script src="./bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>








 
