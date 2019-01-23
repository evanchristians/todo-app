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

        $entries  = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        if(isset($_POST['submit'])) {
            $entry = $_POST['entry'];
            $due = $_POST['due'];
            $details = $_POST['details'];

            $query_insert = "INSERT INTO todo_test(item, due, details) VALUES('$entry', '$due', '$details')";

            if(mysqli_query($conn, $query_insert)){
                header('Location: '.$_SERVER['PHP_SELF']);
            } else {
                echo 'ERROR: '.mysqli_error($conn);
            }   
        }

        if(isset($_POST)) {
            foreach ($_POST as $i => $remove) {
                $query_remove = "DELETE FROM todo_test WHERE id = $i";
                if(mysqli_query($conn, $query_remove)){
                    header('Location: '.$_SERVER['PHP_SELF']);
                } else {
                    echo 'ERROR: '.mysqli_error($conn);
                }   
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
                <input type="date" name="due" id="due" value="<?php echo date("Y-m-d");?>">
                <input type="text" name="entry" placeholder="Task name" required autocomplete="off">
                <input type="text" name="details" placeholder="Task description (optional)" autocomplete="off">

                <div class="add">
                    <button type="submit" name="submit">Add Task</button>

                </div>

            </div>
        </form>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

        <?php
            foreach ($entries as $i => $entry): 
        ?>

            <input type="checkbox" name="<?php echo $entry['id'] ?>" id="checked-<?php echo $i ?>">

            <label for="checked-<?php echo $i ?>">
                <div class="entry">
                    <h2>
                        <?php echo $entry['item']; ?>
                    </h2>
                    <article class="due">
                        <?php echo date("d M y", strtotime($entry['due']));?>
                    </article>
                    <article class = "details">
                        <?php echo $entry['details']; ?>
                    </article>
                    <div class="x">✓</div>
                </div>
            </label>

        <?php
            endforeach;
        ?>
            <?php if (count($entries) >= 1) { ?>

            <button type="submit" name="remove">Remove Completed Tasks</button>

            <?php } ?>
        </form>      

    </main>

    <footer>

    </footer>
</body>
</html>