<?php

// todo: Check if data is sent with GET method and do something 

// if(isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// }

// todo: Check if data is sent with POST method and do something 

if(isset($_POST['submit'])) {
    echo $_POST['email'];
    echo $_POST['title'];
    echo $_POST['ingredients'];
}

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    
    <?php include('templates/header.php'); ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="add.php" method="POST" class="white">

            <label for="email">Your Email</label>
            <input type="text" name="email">

            <label for="title">Pizza Title:</label>
            <input type="text" name="title">

            <label for="ingredients">Ingredients (comma seperated):</label>
            <input type="text" name="ingredients">

            <div class="center">
                <input type="submit" class="btn brand z-depth-0" value="submit" name="submit">
            </div>
        </form>
    </section>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>

        <?php include('templates/footer.php'); ?>

    
</html>