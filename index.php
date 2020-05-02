<?php
session_start();

if(isset($_SESSION['userid'])){
        require("./db.php");
        $userid = $_SESSION['userid'];
        
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id= ?');
        $stmt->execute([$userid]);
        $user = $stmt->fetch();
        if($user){
            $message= 'your role is a guest';
        }

    }


     
                
                
                
                
                
                
                
?>
<?php require("./inc/header.html");?>

<div class="container">
      <div class="card bg-light mb-3">
        <div class="card-header">

        <?php if(isset($message)){
            ?>
         <h5>Welcome <?php echo $user->dpname ?></h5>
        </div>
                <?php if( $user->acctno === 'not set' or $user->bank === 'not set') { ?>
                
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Update Account Details</strong> Your account details are not set <a href="https://trencynews.herokuapp.com/updateaccount.php"><button class="btn btn-success" style="float:right;">Update Account</button></a>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                <?php } ?>

            <?php }else{ ?>

        
          <h5>Welcome Guest</h5>
        <?php } ?>
        <div class="card-body">
          <?php if(isset($message)){
            ?>
         <h5>This is a super secret content for only logged in people</h5>
        <?php }else{?>
          <h4>Please Login/register to unlock all contents</h4>
        <?php } ?>
        </div>
      </div>
    </div>

<?php require("./inc/footer.html");?>


<script src="./bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
  <script src="./bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
