<?php

include('./dataconnection.php');
if (!$conn) {
    echo "connection error" . mysqli_connect_error();
}

$selectQuery = 'SELECT id, title, ingredients FROM pizzas ORDER BY createdAt;';

$result = mysqli_query($conn, $selectQuery);

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);
//    print_r($pizzas);
?>

<!DOCTYPE html>
<html lang="en">
<?php
include('./template/Header.php');
?>

<h4 class="center grey-text">Pizzas</h4>
<div class="container">
    <div class="row">

        <?php foreach ($pizzas as $pizza) {  ?>
            <div class="col s6 md3">
                <div class="card z-depth-0">

                    <div class="card-content">
                        <h5 class="center"><?php echo htmlspecialchars($pizza['title']); ?></h5>
                        <div class="">
                            <ul>
                                <?php
                                $ingredientsList = explode(',', htmlspecialchars($pizza['ingredients']));
                                foreach ($ingredientsList as $ingredient) {
                                    echo "<li class='grey-text'>- $ingredient </li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text">
                            more info
                        </a>
                    </div>

                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
include('./template/Footer.php');
?>

</html>