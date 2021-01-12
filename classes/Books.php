<?php
require_once 'Db.php';


class Books extends Db
{
    protected function getAllBooks()
    {
        try {
            $sql = "SELECT * FROM books ORDER BY book_date ASC";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit('Failed to retrieve Books list');
        }
    }

    protected function getBook(string $title, string $author)
    {
        try {
            $sql = "SELECT * FROM books WHERE book_title=:title AND  book_author= :author";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':author', $author);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit('Failed to retrieve Book');
        }
    }

    protected function getBookByID($id)
    {
        try {
            $sql = "SELECT * FROM books WHERE book_id=:id;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            $results = $stmt->fetch();
            return $results;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit('Failed to retrieve Book');
        }
    }

    protected function setBook(string $title, string $author, string $description, int $price, int $old_price, string $image, string $date)
    {
        try {
            $sql = "INSERT INTO  books (book_title, book_author, book_desc, book_price, book_old_price, book_image, book_date) VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title, $author, $description, $price, $old_price, $image, $date]);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit('Failed to create Book');
        }
    }

    protected function updateBook($book_id, string $title, string $author, string $description,  $price, int $old_price, $image)
    {
        try {

            $sql = "UPDATE `books` SET `book_title` = :book_title, 
            `book_author` = :book_author,
            `book_desc` = :book_desc,
            `book_price` = :book_price,
            `book_old_price` = :book_old_price,
            `book_image` = :book_image
            WHERE `books`.`book_id` = :book_id;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':book_id', $book_id);
            $stmt->bindValue(':book_title', $title);
            $stmt->bindValue(':book_author', $author);
            $stmt->bindValue(':book_desc', $description);
            $stmt->bindValue(':book_price', $price);
            $stmt->bindValue(':book_old_price', $old_price);
            $stmt->bindValue(':book_image', $image);

            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit('Failed to Update Book');
        }
    }

    protected function deleteBook($book_id)
    {
        try {
            $sql = 'DELETE FROM books 
                WHERE book_id = :book_id';
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(':book_id', $book_id);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit('Failed to delete Book');
        }
    }
}