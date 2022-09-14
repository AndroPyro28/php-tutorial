<?php 
    // indexed arrays
    $people = ['shaun', 'crystal', 'yoshi'];
    $people2 = ['mario', 'luigi', 'hetti'];
    
    array_push($people, 50);
    // echo count($people);
    $allPeople = [...$people, ...$people2];

    print_r($allPeople);

    //associative arrays
    echo "<br>";
    $robots = [ 'hello1' => 'andro',  'hello2' => 'jean',  'hello3' => 'john doe'];
    print_r($robots);

    // for($i = 0; $i < count($allPeople); $i++) {
    //     echo " <br> $allPeople[$i]";
    // }

    include ('./data.php');

    echo "<br>";
    
    print_r($data);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My first php file</title>
</head>

<body>
    <?php  foreach($allPeople as $people) {?>
         <h1><?php echo "<br>" . $people ; ?></h1>
        <?php } ?>

</body>

</html>