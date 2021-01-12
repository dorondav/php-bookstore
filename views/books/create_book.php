<?php include  '../../includes/header.inc.php'; ?>

<?php
$errorMsg = '';

if (isset($_GET['error'])) {
    $errorType = $_GET['error'];

    switch ($errorType) {
        case 'emptyfields':
            $errorMsg = ' <div class="errorMsg"> Please fill all the fields </div>';
            break;
        case 'authorname':
            $errorMsg = '<div class="errorMsg"> Author name not valid </div>';
            break;
        case 'authorname':
            $errorMsg = '<div class="errorMsg"> Author name not valid. no numbers or signs are allowed </div>';
            break;
        case 'authorlength':
            $errorMsg = '<div class="errorMsg"> Author name not valid. please use upto 120 characters </div>';
            break;
        case 'titlelength':
            $errorMsg = '<div class="errorMsg"> Book name not valid. please use upto 120 characters </div>';
            break;
        case 'decslength':
            $errorMsg = '<div class="errorMsg"> Book description not valid. please use upto 300 characters </div>';
            break;
        case 'errorrice':
            $errorMsg = '<div class="errorMsg"> New price Must me lower than old price </div>';
            break;
        default:
            $errorMsg = '';
    }
}

?>

<section class="createBook">
    <div class="container">
        <h1>Add New Book</h1>
        <?php if ($errorMsg != ' ') : ?>
        <?php echo $errorMsg; ?>
        <?php endif ?>
        <form action="../../controllers/books/create_book.controller.php" method="POST" enctype="multipart/form-data">
            <label for="book_cover">Cover</label>
            <input type="file" name="book_cover">
            <label for="book_title">Title</label>
            <input type="text" name="book_title" value="<?php echo $_GET['title'] ?? null ?>">
            <label for="book_author">Author</label>
            <input type="text" name="book_author" value="<?php echo $_GET['author'] ?? null ?>">
            <label for=" book_desc">Description</label>
            <textarea name="book_desc"><?php if (isset($_GET['desc'])) {
                                            echo htmlspecialchars($_GET['desc']);
                                        }  ?></textarea>
            <label for=" book_price">Selling Price</label>
            <input type="number" step="0.01" name="book_price" value="<?php echo $_GET['price'] ?? null ?>">
            <label for=" book__old_price">Old Price</label>
            <input type="number" step="0.01" name="book_old_price" value="<?php echo $_GET['old_price'] ?? null ?>">
            <button class="btn btn-danger" type="submit" name="create_book">Submit</button>
        </form>
    </div>

</section>