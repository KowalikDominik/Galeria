<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Zdjęcia Kasi i Dominika 2016</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <style>

            /* Demo styles */
            html,body{background:#fff;margin:0;}
            body{border-top:0px solid #000;}
            .content{color:#777;font:12px/1.4 "helvetica neue",arial,sans-serif;width:1000px;margin:0px auto;}
            h1{font-size:12px;font-weight:normal;color:#ddd;margin:0;}
            p{margin:0 0 20px}
            a {color:#22BCB9;text-decoration:none;}
            .cred{margin-top:20px;font-size:11px;}

            /* This rule is read by Galleria to define the gallery height: */
            #galleria{height:650px;}
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }

#preloader {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: #fff;
    z-index: 1000;
}
#preloader #image {
    width: 200px;
    height: 120px;
    position: absolute;
    left: 50%;
    top: 50%;
    background: url('Preloader.gif') no-repeat center;
    margin: -60px 0 0 -100px;
}

        </style>

        <!-- load jQuery -->
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.js"></script> -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <!-- load Galleria -->
        <script src="galleria-1.5.1.min.js"></script>
   <script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    </head>
<body >
<div id="preloader">
    <div id="image"><div style="padding-top: 120px;text-align: center;"><div style="background: #fff;">Trwa wczytywanie zdjęć</div></div></div>
</div>
</div>
<?php
session_start();
if (!isset($_POST['password']) && @$_SESSION['auth'] == FALSE) {
  ?>

  <div class="jumbotron" style="width:400px;height:100px; padding:10px;background: #fff;position: absolute;top: 50%;left: 50%;margin-left: -200px;margin-top: -50px">
  <strong>Podaj Hasło:</strong>
    <form name="form-logowanie" action="index.php" method="post" class="form-signin">
        <div class="panel-body">
            <div class="input-group">
                  <input type="text" class="form-control" name="password" required>
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Oglądaj!</button>
                  </span>
            </div>
      </div>
    </form>
      
</div>

  
  <?php
  }
    /* jeżeli istnieje zmienna  password i sesja z autoryzacją użytkownika jest FALSE to wykonaj
     * skrypt logowania
     */
    elseif (isset($_POST['password']) && @$_SESSION['auth'] == FALSE) {
      
        // jeżeli pole z hasłem nie jest puste      
        if (!empty($_POST['password'])) {
          
     
        
        // szyfruję wpisane hasło za pomocą funkcji md5()
        $password = md5($_POST['password']);
        $current = file_get_contents('etc/haslo.txt');
            if ($_POST['password']=='demo'){
                $_SESSION['auth'] = 2;
                header("Location: index.php");
            }
            elseif ($password == $current) {

                $_SESSION['auth'] = 1;
                
                //przekierwuję użytkownika na stronę z ukrytymi informacjami
              
                echo '<p style="padding-top:10px;"><strong>Proszę czekać...</strong><br>trwa logowanie i wczytywanie danych<p></p>';
                header("Location: index.php");
            }
            
            // jeżeli zapytanie nie zwróci 1, to wyświetlam komunikat o błędzie podczas logowania
            else {
                echo '<p style="padding-top:10px;color:red" ;="">Błędne hasło<br>';
                echo '<a href="index.php" style="">Wróć do formularza</a></p>';
            }
        }
        
        // jeżeli pole login lub hasło nie zostało uzupełnione wyświetlam błąd
        else {
            echo '<p style="padding-top:10px;color:red" ;="">Błąd podczas logowania<br>';
            echo '<a href="index.php" style="">Wróć do formularza</a></p>';    
        }
    }
if(@$_SESSION['auth'] == TRUE){
    ?>
    <div class="content">
        <div style="display: flex;">
        <div style="padding-top: 25px;">
        <h1 style="color: #000">Kasia i Dominik</h1>
        <p>Ślub i wesele 24.09.2016</p></div>
        <div class="btn-group" role="group" style="margin:20px;height: 40px;">
        <a class="btn btn-success" href="index.php?id=0" role="button">Przygotowania</a>
        <a class="btn btn-success" href="index.php?id=1" role="button">Ceremonia</a>
        <a class="btn btn-success" href="index.php?id=2" role="button">Początek wesela</a>
        <a class="btn btn-success" href="index.php?id=3" role="button">Wesele cz. 1</a>
        <a class="btn btn-success" href="index.php?id=4" role="button">Wesele cz. 2</a>
        <a class="btn btn-success" href="index.php?id=5" role="button">Oczepiny</a>

    
        </div>
        <div style="position:absolute;top: 740px; left:50%; margin:20px 0 0 -225px; height: 40px;">
            <button id="pobierz" type="button" class="btn btn-default btn-lg" style="width:450px ">Pobierz zdjęcia w lepszej jakości na komputer</button>
        </div>
        </div>
           
        

          
        <?php
        if (@$_SESSION['auth'] == 1)
        $galeria=Array("przygotowania","ceremonia","poczatek-wesela","wesele1","wesele2","oczepiny");
        elseif (@$_SESSION['auth'] == 2) 
        $galeria=Array("demo1","demo2");
        
        if(isset($_GET['id']))
             $folder=@$galeria[$_GET['id']];
        else $folder=$galeria[0];
            if(file_exists($folder)){
                if ($handle = opendir($folder)) {
                    $files = array();
                    while ($files[] = readdir($handle));
                        sort($files);
                        closedir($handle);
                }

                $blacklist = array('.','..','');

                foreach ($files as $Plik) {
                    if (!in_array($Plik, $blacklist)) { 
?>

        <div id="galleria">
            <a href="<?php echo $folder.'/'.$Plik; ?>">
                <img src="<?php echo $folder.'/'.$Plik; ?>" >
<?php
                }
                }
  ?>              
<script>
    $(function() {
        // Load the classic theme
        Galleria.loadTheme('galleria.classic.min.js');
//('.galleria').data('galleria').enterFullscreen();
        // Initialize Galleria
        Galleria.run('#galleria');
    });

</script>
    <?php        
            }

        
        else{
            echo('<div id="galleria">Nie istnieje taka galeria</div>');

        }
    ?>
         

        </div>
       
     
    </div>



<?php 
}
?>
<script>
        
    $('#full').click(function() {
    $('#galleria').data('galleria').enterFullscreen(40); // will start slideshow attached to #image when the element #play is clicked

});

$( "#pobierz" ).click(function() {
  
  swal({
  title: "Wybierz część:",
  <?php if (@$_SESSION['auth'] == 1) {?>
  text: '<a class="btn btn-success" href="pliki/przygotowania_1.rar" role="button">Przygotowania</a><br><a class="btn btn-success" style="margin-top:5px;" href="pliki/ceremonia_1.rar" role="button">Ceremonia</a><br><a class="btn btn-success" style="margin-top:5px;" href="pliki/pocztatek-wesela_1.rar" role="button">Początek wesela</a><br><a class="btn btn-success" style="margin-top:5px;" href="pliki/wesele_1.rar" role="button">Wesele cz. 1</a><br><a class="btn btn-success" style="margin-top:5px;" href="pliki/wesele_2.rar" role="button">Wesele cz. 2</a><br><a class="btn btn-success" style="margin-top:5px;" href="pliki/oczepiny_1.rar" role="button">Oczepiny</a>',
  <?php }else echo'text: "brak linków w demo",';?>
  
  confirmButtonText: "Zamknij okno",
  html: true
});
});

    </script>


<script type="text/javascript">
$(window).load(function() { // Czekamy na załadowanie całej zawartości strony
    $("#preloader #image").fadeOut(); // Usuwamy grafikę ładowania
    $("#preloader").delay(350).fadeOut("slow"); // Usuwamy diva przysłaniającego stronę
})
    
</script>
    </body>
</html>
