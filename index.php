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


     if(isset($_POST['activate'])) {
                    $stmt = $pdo->query("SELECT * FROM users WHERE status='active' and stage='1' ORDER BY RAND() LIMIT 1");
                    $thiss = $stmt->fetch();
                    $topay = $thiss->id;



                    
                   
                    
                   


                    
                }
                
                
                
                
                
                
                
?>
<?php require("./inc/header.html");?>

<div class="container">
      <div class="card bg-light mb-3">
        <div class="card-header">

        <?php if(isset($message)){
            ?>
         <h5>Welcome <?php echo $user->name ?></h5>
            <div class="card">

                <h4 style="display:inline;">Account Status: <?php echo $user->status;?></h4>

                <?php if($user->status==='inactive') {?>
                <form action="index.php" method="POST">

                <?php if(isset($topay)){

                }else{ ?>
                <button class="btn btn-success" name="activate">Activate</button>
                <?php }?>
</form>
                 <?php if(isset($topay)){
                    $stmt = $pdo->query("SELECT * FROM users WHERE id = $topay");
                    $pay = $stmt->fetch();

                    echo $pay->acctno. "<br>";
                    echo $pay->acctname. "<br>";
                    echo $pay->bank;

                }?> 

            <?php } ?>
            </div>

        <?php }else{?>
          <h5>Welcome Guest</h5>
        <?php } ?>
        </div>
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