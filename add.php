<?php 
        $errors = ['email' => '', 'pizzaTitle' => '', 'ingredients' => ''];
        $values = ['email' => '', 'pizzaTitle' => '', 'ingredients' => ''];
        include('./dataconnection.php');
    if (isset($_POST['submit'])) {
         $values['email'] = htmlspecialchars($_POST['email']);
         $values['pizzaTitle'] = htmlspecialchars($_POST['pizzaTitle']);
         $values['ingredients'] = htmlspecialchars($_POST['ingredients']);

        if(empty($values['email']) || !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email must be valid email and required <br />';
        }

        if(empty($values['pizzaTitle']) || !preg_match('/^[a-zA-Z\s]+$/', $values['pizzaTitle'])) {
            $errors['pizzaTitle'] = 'pizzaTitle must be letter and required! <br />';
        }

        if(empty($values['ingredients']) || !preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)$/', $values['ingredients'])) {
            $errors['ingredients'] = 'ingredients be comma separatd and required! <br />';
        }

        if(!array_filter($errors)) {
            header('location: index.php');
        }

    } 
?>


<!DOCTYPE html>
<html lang="en">
<?php
include('./template/Header.php');
?>
    <section class="container grey-text">
        <h4 class="center">Add a pizza</h4>

        <form action="./add.php" class="white" method="POST">
            <label for="">Your Email</label>
            <input type="text" name="email" value="<?php echo $values['email'] ?>">
            <div class="red-text">
                <?php echo $errors['email'] ?>
            </div>

            <label for="">Pizza title</label>
            <input type="text" name="pizzaTitle" value="<?php echo $values['pizzaTitle'] ?>">
            <div class="red-text">
            <?php echo $errors['pizzaTitle'] ?>
            </div>

            <label for="">Ingredients (comma separated)</label>
            <input type="text" name="ingredients" value="<?php echo $values['ingredients'] ?>">
            <div class="red-text">
            <?php echo $errors['ingredients'] ?>
            </div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brandz-depth-0">
            </div>
        </form>
    </section>
<?php
include('./template/Footer.php');
?>

</html>