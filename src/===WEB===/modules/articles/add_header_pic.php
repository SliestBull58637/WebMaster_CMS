<?php

$min_perm_requied = 1;

include '../kernel/kernel.php';

date_default_timezone_set('Europe/Prague');

$msg = "";
$msg_visible = "display: none;";
$msg_class = "";

$page = "";

if(isset($_GET['id'])){
    
$id = $_GET['id'];
    
$sql = "SELECT * FROM pages WHERE id='$id'";

$page_result = mysqli_query($con,$sql);
    

if($page_result->num_rows == 1){
    $page =  mysqli_fetch_array($page_result);
}
}
    else{
        $msg = "<strong>CHYBA:</strong> Stránka nebyla nalezena.";
        $msg_visible = "display: block;";
        $msg_class = "danger";
    }

if(isset($_POST['submit'])){
$content = $_POST['src'];
$sql = "UPDATE `pages` SET `header_img_path`='$content'WHERE id='$id'";
$page_result = mysqli_query($con,$sql);
    
header('location: edit.php?id=' . $id . '#success=delete_image');

    $msg = "<strong>ÚSPĚCH:</strong> Obrázek stránky byl upraven.";
        $msg_visible = "display: block;";
        $msg_class = "success";

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
	<div class="container">
	    	<div class="alert alert-<?php echo $msg_class;?>" style="display:<?php echo $msg_visible;?>; width: 50%"><?php echo $msg;?></div>
	<?php //if($page != ""){include "$w/edit.php";}?>
	</div>
	
	<section class="container">
	    <h4>Vyberte úvodní obrázek</h4>
	    <span class="text text-muted">Pro stránku: <?php echo $page['name']?></span>
	                <hr style="width:100%">

	    <?php
if ($handle = opendir('../../files/obrázky')) {
?>

<table class="table table-border table-hover" style="width: 75%">
    <tbody>
       <?php
        
        while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {

            echo '        <tr>
            <td><img width="25%" height="auto" src="../../files/obrázky/' . $entry . '" alt=""></td>
            <td><form action="" method="post"><input name="submit" value="Vybrat" type="submit" class="btn btn-outline-primary"><input name="src" type="hidden" value="' . $entry . '"></form></td>
        </tr>';
        }
    }
        closedir($handle);
}
        ?>
    </tbody>
</table>
	    
	    
	</section>
		<br>
	</main>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/js.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
	<script>
	$('.navbar-nav>li>a').on('click', function(){
		$('.navbar-collapse').collapse('hide');
	});
	//window.addEventListener("hashchange", function() { scrollBy(0, -50) })
        
        
        var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

	var shiftWindow = function() { scrollBy(0, -60) };
	if (location.hash) shiftWindow();
	window.addEventListener("hashchange", shiftWindow);
        
        function identifier(){
            let input = document.querySelector("#page_name").value;
            let result = input.replace(" ","-").replace("ě","e").replace("š","s").replace("č","c").replace("ř","r").replace("ž","z").replace("ý","y").replace("á","a").replace("í","i").replace("é","e").replace("ú","u").replace("ů","u");
            
            document.querySelector("#page_identifier").value = result.toLowerCase();
        }
        function identifierGenerate(){
            let input = document.querySelector("#page_identifier").value;
            let result = input.replace(" ","-").replace("ě","e").replace("š","s").replace("č","c").replace("ř","r").replace("ž","z").replace("ý","y").replace("á","a").replace("í","i").replace("é","e").replace("ú","u").replace("ů","u");
            
            document.querySelector("#page_identifier").value = result.toLowerCase();
        }
        

        tinymce.init({
        selector: '#texta',
        plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
        menubar: 'file edit view insert format tools table help',
        toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        toolbar_sticky: true,
        autosave_ask_before_unload: true,
        autosave_interval: '30s',
        autosave_prefix: '{path}{query}-{id}-',
        autosave_restore_when_empty: false,
        autosave_retention: '2m',
        image_advtab: true,
        link_list: [
          { title: 'My page 1', value: 'https://www.codexworld.com' },
          { title: 'My page 2', value: 'http://www.codexqa.com' }
        ],
        image_list: [
          { title: 'My page 1', value: 'https://www.codexworld.com' },
          { title: 'My page 2', value: 'http://www.codexqa.com' }
        ],
        image_class_list: [
          { title: 'None', value: '' },
          { title: 'Some class', value: 'class-name' }
        ],
        importcss_append: true,
        file_picker_callback: (callback, value, meta) => {
          /* Provide file and text for the link dialog */
          if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
          }

          /* Provide image and alt text for the image dialog */
          if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
          }

          /* Provide alternative source and posted for the media dialog */
          if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
          }
        },
        templates: [
          { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
          { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
          { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
        ],
        template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
        template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
        height: 600,
        image_caption: true,
        quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
        noneditable_class: 'mceNonEditable',
        toolbar_mode: 'sliding',
        contextmenu: 'link image table',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }.tox-promotion-link{display:none;}' 
    });
        
    document.querySelector(".tox-promotion-link").style.display = "none";
	</script>
	<script>
    <?php
    
    echo "var id = $id";
    
    include 'dist/page-script.js'; 
        
    ?>
    </script>
</body>
</html>
