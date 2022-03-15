<?php

// * Connect to database

$conn = mysqli_connect('localhost', 'pizza_admin', 'admin', 'ninja_pizza');

// * check connection
if(!$conn) {
    echo 'connection error' . mysqli_connect_error();
}

// * write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// * make query and get results
$result = mysqli_query($conn, $sql);

// * Fetch the resulting row as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// * free result from memory 
mysqli_free_result($result);

// * close connection
mysqli_close($conn);

explode(',', $pizzas[0]['ingredients']);

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    
    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Pizzas!</h4>

    <div class="container">
        <div class="row">

        <?php foreach($pizzas as $pizza): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                            <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text">more info</a>
                    </div>
                </div>
            </div>
           
        <?php endforeach; ?>

        <?php if(count($pizzas) >=2) :
        ?>
        <p>there are 2 or more pizzas</p>
        <?php else: ?>
            <p>there are less than 3 pizzas</p>
            <?php endif; ?>

        </div>
    </div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>

        <?php include('templates/footer.php'); ?>

    
</html>