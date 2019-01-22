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
    <header>

        <h1>To Do List</h1>

    </header>

    <main>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

            <input type="text" name="add" placeholder="eg. Exercise">
            <button type="submit">Add Item</button>

        </form>

        <input type="checkbox" name="checked" id="checked-1">
        <label for="checked-1">
            <div class="item">
                <h2>
                    Example Item
                </h2>
                <article>
                    20 &middot Jan
                </article>
                <div class="x">x</div>
            </div>
        </label>

        <input type="checkbox" name="checked" id="checked-2">
        <label for="checked-2">
            <div class="item">
                <h2>
                    Example Item
                </h2>
                <article>
                    20 &middot Jan
                </article>
                <div class="x">x</div>
            </div>
        </label>

        <input type="checkbox" name="checked" id="checked-3">
        <label for="checked-3">
            <div class="item">
                <h2>
                    Example Item
                </h2>
                <article>
                    20 &middot Jan
                </article>
                <div class="x">x</div>
            </div>
        </label>
    
    </main>

    <footer>

    </footer>
</body>
</html>