<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To DO List</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <?php
        require('config/conn.php');

        $query = 'SELECT * FROM todo_test';

        $result = mysqli_query($conn, $query);

        $items  = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        if(isset($_POST['submit'])) {
            $i = $_POST['item'];

            $query_insert = "INSERT INTO todo_test(item) VALUES('$i')";

            if(mysqli_query($conn, $query_insert)){
                header('Location: '.$_SERVER['PHP_SELF']);
            } else {
                echo 'ERROR: '.mysqli_error($conn);
            }   
        }

        mysqli_close($conn);

    ?>

    <header>

        <h1>To Do List</h1>

    </header>

    <main>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

            <div class="box">
                <input type="text" name="item" placeholder="eg. Exercise">
                <button type="submit" name="submit">Add Item</button>

            </div>
        </form>
        <?php
            foreach ($items as $key => $item): 
        ?>

            <input type="checkbox" name="checked" id="checked-<?php $key ?>">

            <label for="checked-<?php $key ?>">
                <div class="item">
                    <h2>
                        <?php echo $item['item']; ?>
                    </h2>
                    <article>
                        20 &middot Jan
                    </article>
                    <div class="x">x</div>
                </div>
            </label>

        <?php
            endforeach;
        ?>

    </main>

    <footer>

    </footer>
</body>
</html>