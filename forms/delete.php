<?php

$min_perm_requied = 1;

session_start();

include '../config.php';
include '../sess.php';

if(isset($_GET['id'])){
    
$id = $_GET['id'];
    
$sql = "SELECT * FROM `pages` WHERE id='$id'";

$page_result = mysqli_query($con,$sql);

$page =  mysqli_fetch_array($page_result);
    
    if(isset($_POST['yes'])){
        
        $sql = "DELETE FROM `pages` WHERE id='$id'";
        mysqli_query($con,$sql);
        header('location: .?success=delete');
        
    }
    if(isset($_POST['no'])){
        header('location: .');
    }
    
}
else{
    header('location: projects.php?err=noid');
}

?>
<?php
    include '../header/head.php';
    ?>
    <body class="hm-gradient">
    <?php
    include '../header/sidebar.php';
    include '../header/navbar.php';
    ?>
    <div class="main">
	<main role="main" class="container" style="margin-left: 270px;background: #fff">
	<section class="container">
           <center>
               
            <br>
            <h4>Opravdu si přejete smazat stránku:<br><?php echo $page['name']?>?</h4>
            <hr style="width:100%">
            <form action="" method="post">
                <button type="submit" name="no" class="btn btn-success">NE</button>
                <button type="submit" name="yes" class="btn btn-danger">ANO</button>
            </form>
           </center>
        </section>
        <br>
	</main>
        </div>
    
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
	<script>
	$('.navbar-nav>li>a').on('click', function(){
		$('.navbar-collapse').collapse('hide');
	});
	//window.addEventListener("hashchange", function() { scrollBy(0, -50) })

	var shiftWindow = function() { scrollBy(0, -60) };
	if (location.hash) shiftWindow();
	window.addEventListener("hashchange", shiftWindow);
	</script>
</body>
</html>