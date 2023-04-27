<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Deluxe - Material Admin Template</title>
    <?php 
        
        require_once 'Helpers/hlp.CSSs.php'; //? EN: put all the css files in the header: FR: mettez tous les fichiers css dans l'en-tête
        
    
    ?>
</head>
<body>
<div id="wrapper">
<?php 



require_once 'Helpers/hlp.TopNav.php'; //? put all the top nav in the header : FR: mettez toute la barre de navigation supérieure dans l'en-tête
require_once 'Helpers/hlp.sideNav.php'; //? put all the side nav in the header : FR: mettez toute la barre latérale dans l'en-tête


//? EN: now we have a working side nav and top nav with the css and js files includded
//? and if you want to use them you can simply this file from the controller and changer the data that you want

//? FR: maintenant nous avons une barre latérale et une barre de navigation supérieure fonctionnelles avec les fichiers css et js inclu
//? et si vous souhaitez les utiliser, vous pouvez simplement ce fichier depuis le contrôleur et changer les données que vous souhaitez

?>
    <main>
    <div id="page-wrapper" style="min-height : 505px;">
    <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header"><?=$bigTitle?></h1>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="<?=$_SESSION['__DIR__'].'home'?>">Home</a> <i class="zmdi zmdi-circle"></i> <?=$title == "Home" ? "" :$title?>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row --> 
    

