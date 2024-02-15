<?php include_once('header.php'); ?>
<body>
    <section class="HomePage">
    <img src="IMG/Montpellier.png" class="Home_image">
    </section>
</body>
<?php
    if (isset($_GET["error"])){
        if ($_GET["error"]== "userERR"){
            echo('<div class="loginErr">Problème de connexion!</div>');
        }
    }


