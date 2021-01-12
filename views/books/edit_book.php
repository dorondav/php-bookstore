<?php include  '../../includes/header.inc.php'; ?>

<?php
require_once '../../classes/Book.php';

$bookObj = new Book();

// $book_author = $_GET['author'];
// $book_name = $_GET['bookname'];
$book_id = $_POST['edit_book_id'];
if (!$book_id) {
    header('Location: ../../index.php?error=booknotupdated');
    exit;
} else {

    $result = $bookObj->showBookByID($book_id);
    // $result = $bookObj->showBook($book_name, $book_author);
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
        <h1>Edit <?php echo $result['book_title'] ?? null ?></h1>
        <?php if ($errorMsg != ' ') : ?>
        <?php echo $errorMsg; ?>
        <?php endif ?>
        <form action="../../controllers/books/edit_book.controller.php" method="POST" enctype="multipart/form-data">
            <label for="book_cover">Cover</label>
            <input type="file" name="book_cover">
            <label for="book_title">Title</label>
            <input type="text" name="book_title" value="<?php echo $result['book_title'] ?? null ?>">
            <label for="book_author">Author</label>
            <input type="text" name="book_author" value="<?php echo $result['book_author'] ?? null ?>">
            <label for=" book_desc">Description</label>
            <textarea name="book_desc"><?php echo htmlspecialchars($result['book_desc']); ?></textarea>
            <label for=" book_price">Selling Price</label>
            <input type="number" step="0.01" name="book_price" value="<?php echo $result['book_price'] ?? null ?>">
            <label for=" book__old_price">Old Price</label>
            <input type="number" step="0.01" name="book_old_price"
                value="<?php echo $result['book_old_price'] ?? null ?>">
            <input type="hidden" name="book_id" value="<?php echo $result['book_id'] ?>">
            <button class="btn btn-danger" type="submit" name="update_book">Submit</button>
        </form>
    </div>

</section>
<?php } ?>