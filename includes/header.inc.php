<?php require_once "autoloader.inc.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <title>Document</title>
</head>

<body>

    <nav>
        <div class="container navContent">
            <div class="logo">
                <a href="/">Bookshop</a>
            </div>
            <!-- <form action="">
                <input type="text" name="search" placeholder="Search">
            </form> -->
            <div class="headerRight">

                <ul>
                    <li><a href="#" class="disabled">Authors</a></li>
                    <li><a href="#aboutUs">About Us</a></li>
                    <li><a href="#" class="disabled">Contact Us</a></li>
                    <li><a href="<?php __DIR__ ?> /views/books/create_book.php">Add Book</a></li>
                    <!-- <li><a href="../views/users/login.php">Login</a></li>
                    <li><a href="../views/users/create.php">Sign Up</a></li> -->
                </ul>

            </div>

        </div>
    </nav>