<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
   <style>
    /* table{
        border-collapse: collapse;
        border-left: none;
        border-right: none;
        border-top: none;
        border-bottom: none;
    }
    tr, td, th{
      border-collapse: collapse;
        border-left: none;
        border-right: none;
        border-top: none;
        border-bottom: none;  
        max-height: 62px;
    }
       th{
           background: #fff;
       }
       tr:hover{
           background: #fff;
       }
       .tox-promotion-link{
    display: none;
} */
nav a{
color:#fff;
}
nav a:hover{
color:#fff;
}
nav .collapse ul li a{
color:#fff;
}
nav .collapse ul li a:hover{
color:#fff;
}
nav .collapse ul li a:active{
color:#fff;
}
nav .collapse .dropdown-menu li a{
color:#000;
}
nav .collapse .dropdown-menu li a:hover{
color:#000;
}
</style>
   <nav class="navbar navbar-expand-lg bg-blue text-white d-flex shadow-sm px-5" style="color:#fff">
        <?php
        
          if(strpos($_SERVER['PHP_SELF'], 'pages') || strpos($_SERVER['PHP_SELF'], 'articles') || strpos($_SERVER['PHP_SELF'], 'places') || strpos($_SERVER['PHP_SELF'], 'users') || strpos($_SERVER['PHP_SELF'], 'updates') || strpos($_SERVER['PHP_SELF'], 'banners') || strpos($_SERVER['PHP_SELF'], 'sections') || strpos($_SERVER['PHP_SELF'], 'galeries'))
            echo '<a class="navbar-brand" href="../.">' . $settings['company_name_short'] . '</a>';
          else
            echo '<a class="navbar-brand" href=".">' . $settings['company_name_short'] . '</a>';
        ?>
<!--		    <span class="navbar-brand"><?php echo $_SESSION['web_name']?></span>-->
  <button class="navbar-toggler navbar-toggler-right text-white me-auto" type="button" data-toggle="collapse" data-target="#navb">
    <i class="fas fa-ellipsis-h"></i>
  </button>

  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav me-auto">
             <li class="nav-item"></li>
    </ul>
<ul class="navbar-nav my-2 my-lg-0 ml-2">
    <li class="nav-item dropdown">
  <a class="nav-link hidden dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><?php echo $_SESSION['name']?></a>
  <ul class="dropdown-menu">
   <?php
    
    if(strpos($_SERVER['PHP_SELF'], 'pages') || strpos($_SERVER['PHP_SELF'], 'articles') || strpos($_SERVER['PHP_SELF'], 'places') || strpos($_SERVER['PHP_SELF'], 'users') || strpos($_SERVER['PHP_SELF'], 'updates') || strpos($_SERVER['PHP_SELF'], 'banners') || strpos($_SERVER['PHP_SELF'], 'sections') || strpos($_SERVER['PHP_SELF'], 'galeries'))
    {
        echo '<li><a class="dropdown-item" href="?m=public">Náhled webu</a></li>
        <li><a class="dropdown-item" href="user.php">Nastavení účtu</a></li>
        <li><hr class="dropdown-divider"></hr></li>
    <li><a class="dropdown-item" href="../auth/logout.php">Odhlásit se</a></li>';
    }
    else
    {
        echo '<li><a class="dropdown-item" href="?m=public">Náhled webu</a></li>
        <li><a class="dropdown-item" href="user.php">Nastavení účtu</a></li>
        <li><hr class="dropdown-divider"></hr></li>
    <li><a class="dropdown-item" href="auth/logout.php">Odhlásit se</a></li>';
    }
    ?>
  </ul>
</li>
<li class="nav-item .flex-reverse">
    <a href="" class="nav-link"><i class="far fa-question-circle"></i></a>
</li>
</ul>
  </div>
</nav>
