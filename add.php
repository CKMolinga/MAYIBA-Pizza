<?php

// todo: Check if data is sent with GET method and do something 

// if(isset($_GET['submit'])) {
//     echo $_GET['email'];
//     echo $_GET['title'];
//     echo $_GET['ingredients'];
// } 

// ! PREVENT AGAINST XSS ATTACKS
//* Use 'htmlspecialchars(<the-data-you-outpu>)'

if(isset($_POST['submit'])) {

    // todo: Check if data is sent with POST method and do something

    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);

    //* Check email
    if(empty($_POST['email'])) {
        echo 'An email is required <br />';
    }
    else {
        $email = $_POST['email'];

        //todo: check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Email must be a valid email address';
        };
    }

    //* Check title
    if(empty($_POST['title'])) {
        echo 'A title is required <br />';
    }
    else {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            echo 'Title must be letters and spaces only';
        };
    }

    //* Check ingredients
    if(empty($_POST['ingredients'])) {
        echo 'Atleast one ingredient is required <br />';
    }
    else {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            echo 'Ingredients must be a comma seperated list';
        };
    }
} //* End of POST check

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