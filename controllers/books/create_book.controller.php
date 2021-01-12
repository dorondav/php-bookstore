<?php
require_once '../../classes/Book.php';
require_once '../../assets/functions.php';

if (isset($_POST['create_book'])) {
    $book_title = htmlspecialchars($_POST['book_title']);
    $book_author = htmlspecialchars($_POST['book_author']);
    $book_desc = htmlspecialchars($_POST['book_desc']);
    $book_price = htmlspecialchars($_POST['book_price']);
    $book_old_price = htmlspecialchars($_POST['book_old_price']);
    $entrance = htmlspecialchars(date('Y-m-d H:i:s'));
    $image = $_FILES['book_cover'] ?? null;

    // Form Validation
    if (empty($book_title)  || empty($book_author) || empty($book_desc) || empty($book_price) || empty($book_old_price)) {
        header("Location: /views/books/create_book.php?error=emptyfields&title=" . $book_title . "&author=" . $book_author . "&desc= " . $book_desc . "&price=" . $book_price . "&old_price=" . $book_old_price);
        exit;
    }
    if (!preg_match('/^[a-zA-Z\s]*$/', $book_author)) {
        header("Location: /views/books/create_book.php?error=authorname&title=" . $book_title . "&desc= " . $book_desc . "&price=" . $book_price . "&old_price=" . $book_old_price);
        exit;
    }
    if (strlen($book_title) > 120) {
        header("Location: /views/books/create_book.php?error=titlelength&author=" . $book_author . "&desc= " . $book_desc . "&price=" . $book_price . "&old_price=" . $book_old_price);
        exit;
    }
    if (strlen($book_author) > 120) {
        header("Location: /views/books/create_book.php?error=authorlength&title=" . $book_title . "&desc= " . $book_desc . "&price=" . $book_price . "&old_price=" . $book_old_price);
        exit;
    }

    if (strlen($book_desc) > 300) {
        header("Location: /views/books/create_book.php?error=decslength&title=" . $book_title . "&author=" . $book_author  . "&price=" . $book_price . "&old_price=" . $book_old_price);
        exit;
    }

    if ($book_old_price >= $book_price) {
        header("Location: /views/books/create_book.php?error=errorrice&title=" . $book_title . "&author=" . $book_author . "&desc= " . $book_desc);
        exit;
    }


    $newBook = new Book();
    $newBook->createBook($book_title, $book_author, $book_desc, (int)$book_price, (int) $book_old_price, $image, $entrance);
    header("Location: /index.php?success=bookadded");
}
header("Location: /index.php");