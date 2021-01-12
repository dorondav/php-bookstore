<?php
require_once '../../classes/Book.php';

if (isset($_POST["delete_book"])) {
    $book_id = $_POST['delete_book_id'];
    $bookObj = new Book();
    $getImgPath = $bookObj->showBookByID($book_id);
    $image = $getImgPath['book_image'];
    $bookObj->deleteBookById($book_id, $image);
    header("Location: /index.php?success=bookdeleted");
    exit;
}
header("Location: /index.php");