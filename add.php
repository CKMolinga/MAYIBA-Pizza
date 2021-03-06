<?php

include('config/db_connect.php');

$email = $title = $ingredients = '';
$errors = array('email' => '', 'title' => '', 'ingredients' => '');

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
        $errors['email'] = 'An email is required <br />';
    }
    else {
        $email = $_POST['email'];

        //todo: check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must be a valid email address';
        };
    }

    //* Check title
    if(empty($_POST['title'])) {
        $errors['title'] = 'A title is required <br />';
    }
    else {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['title'] = 'Title must be letters and spaces only';
        };
    }

    //* Check ingredients
    if(empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'Atleast one ingredient is required <br />';
    }
    else {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma seperated list';
        };
    }

    if(array_filter($errors)) {
        // ! echo 'errors in the form';
    }
    else {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

        // * create sql
        $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title', '$email', '$ingredients')";

        // * save to db and check
        if(mysqli_query($conn, $sql)) {

            // todo: we redirect to the index after data is succesfully saved in te db

            // * succes
            header('Location: index.php'); 
        }
        else {

            // ! Error 
            echo 'query error' . mysqli_error($conn);
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
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="red-text">
                <?php echo $errors['email']; ?>
            </div>

            <label for="title">Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
            <div class="red-text">
                <?php echo $errors['title']; ?>
            </div>

            <label for="ingredients">Ingredients (comma seperated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
            <div class="red-text">
                <?php echo $errors['ingredients']; ?>
            </div>

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