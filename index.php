<?php include './includes/header.inc.php';
require_once  './assets/functions.php'
?>
<div class="container main--page">
    <h1>My Boring Ass Books</h1>
    <h3>Latest Books</h3>

    <main class="allBooks">
        <?php
        $books = new Book();
        $books = $books->showAllBooks();
        $i = 0;

        foreach ($books as $book) :
        ?>

        <div class="card">
            <a
                href="./views/books/single_book.php?<?php echo 'bookname=' . $book['book_title'] . '&author=' . $book['book_author']; ?>">
                <img src="/assets/<?php echo $book['book_image'] ?>" alt=" <?php $book['book_title'] ?>">
            </a>
            <div class="content">
                <a
                    href="./views/books/single_book.php?<?php echo 'bookname=' . $book['book_title'] . '&author=' . $book['book_author']; ?>">
                    <div class="bookTitle"><?php echo $book['book_title']; ?> </div>
                </a>
                <div class="bookAuthor"><?php echo $book['book_author']; ?> </div>
                <div class="bookPricing">
                    <div class="oldPrice"><span>$</span><?php echo  $book['book_old_price']; ?></div>
                    <div class="newPrice "><span>$</span><?php echo $book['book_price']; ?></div>
                </div>
            </div>
        </div>
        <?php
        // Limit Foreach Output
        // if (++$i == 12) break;
        endforeach; ?>

    </main>

</div>

<section class="sale">
    <div class="container">

        <div class="content">
            <h1>Lorem ipsum dolor sit.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum quia sint architecto aut eligendi, ipsa
                cumque? Suscipit rem obcaecati, neque in, sequi eos quasi perspiciatis ipsam vel veniam saepe omnis.
                Amet, voluptatum expedita.</p>

        </div>
    </div>


</section>

<section class="aboutUs" id="aboutUs">
    <div class="container aboutUsFlex">
        <div class="aboutUsText">
            <div class="content">
                <p>about Us</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, sunt corrupti provident et non
                    dolor
                    natus exercitationem cumque, nemo voluptate hic eum nesciunt. Nostrum, pariatur. Laborum earum
                    voluptatem dolorum sapiente nulla saepe qui dolorem recusandae, praesentium illo fugiat laboriosam
                    reprehenderit?</p>
            </div>

        </div>
        <div class="aboutUsLogo">
            <p>Bookshop</p>
        </div>
    </div>
</section>
</body>

</html>