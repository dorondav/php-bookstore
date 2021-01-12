<?php include  '../../includes/header.inc.php';
require_once '../../classes/Book.php';
$book = new Book();
$book_author = $_GET['author'];
$book_name = $_GET['bookname'];
$result = $book->showBook($book_name, $book_author);
?>


<section>
    <h1><?php echo $result[0]['book_title'] ?></h1>
    <div class="container singleBook">
        <div class="btns flex">
            <!-- <a class="btn btn-primary"
                href="/views/books/edit_book.php?<?php echo 'bookname=' . $book_name  . '&author=' . $book_author; ?>">
                Edit
            </a> -->
            <form action="/views/books/edit_book.php" method="POST">
                <input type="hidden" name="edit_book_id" value="<?php echo $result[0]['book_id'] ?>">
                <button type="submit" name="edit_book_page" class="btn btn-primary">Edit</button>
            </form>
            <form action="../../controllers/books/delete_book.controller.php" method="POST">
                <input type="hidden" name="delete_book_id" value="<?php echo $result[0]['book_id'] ?>">
                <button type="submit" name="delete_book" class="btn btn-danger">DELETE</button>
            </form>

        </div>
        <div class="flex">
            <div class="bookImage">

                <img src="/assets/<?php echo $result[0]['book_image'] ?>" alt="<?php echo $result[0]['book_title'] ?>">
            </div>
            <div class="bookInfo">
                <div class="content">
                    <ul>
                        <li><b> Title:</b> <?php echo $result[0]['book_title'] ?></li>
                        <li><b> Author: </b> <?php echo $result[0]['book_author'] ?></li>
                        <li><b> description:</b> <?php echo $result[0]['book_desc'] ?></li>
                        <li><b> Price </b> $<?php echo $result[0]['book_price'] ?></li>
                        <li><b> Old Price</b> <span class="oldPrice"> $<?php echo $result[0]['book_old_price'] ?></span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>