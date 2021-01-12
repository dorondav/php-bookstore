<?php
require_once '../../classes/Book.php';

if (isset($_POST['update_book'])) {
    $book_title = htmlspecialchars($_POST['book_title']);
    $book_author = htmlspecialchars($_POST['book_author']);
    $book_desc = htmlspecialchars($_POST['book_desc']);
    $book_price = htmlspecialchars($_POST['book_price']);
    $book_old_price = htmlspecialchars($_POST['book_old_price']);
    $book_id = htmlspecialchars($_POST['book_id']);
    $image = $_FILES['book_cover'] ?? null;

    if (!$book_id) {
        header('Location: index.php');
        exit;
    }

    // Form Validation
    if (empty($book_title)  || empty($book_author) || empty($book_desc) || empty($book_price) || empty($book_old_price)) {
        header("Location: /views/books/edit_book.php?error=emptyfields&title=" . $book_title . "&author=" . $book_author . "&desc= " . $book_desc . "&price=" . $book_price . "&old_price=" . $book_old_price);
        exit;
    }

    $newBook = new Book();
    $newBook->editBook($book_id, $book_title, $book_author, $book_desc, (float)$book_price, (int)$book_old_price, $image);
    header("Location: /index.php?success=bookupdated");
    exit;
}
header("Location: /index.php");