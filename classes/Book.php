<?php
require_once 'Books.php';
class Book extends Books
{

    public function showAllBooks()
    {
        return $this->getAllBooks();
    }

    public function showBook(string $title, string $author)
    {
        return $this->getBook($title, $author);
    }

    public function createBook(string $title, string $author, string $description, int $price, int $old_price, array $image, string $date)
    {
        //Create Cover FIles
        $image_path = self::getCover($image);

        // Pass to DB
        $this->setBook($title, $author, $description, $price, $old_price, $image_path, $date);
    }

    public function showBookByID($id)
    {
        return $this->getBookByID($id);
    }

    public function deleteBookById($id, $image)
    {
        self::deleteImages($image);
        return $this->deleteBook($id);
    }

    public function editBook($id, string $title, string $author, string $description, $price, int $old_price, $image)
    {

        //Create Cover FIles
        $image_path = self::getCover($image);

        // Pass to DB
        $this->updateBook((int)$id, $title, $author, $description, $price, $old_price, $image_path);
    }

    protected static function getCover($image)
    {
        $imagePath = '';
        if (!is_dir('../../assets/images')) {
            mkdir('../../assets/images', 0777, true);
        }

        if ($image && $image['tmp_name']) {
            $imagePath = 'images/' . self::randomString(8) . '/' . $image['name'];
            mkdir(dirname('../../assets/' . $imagePath));
            move_uploaded_file($image['tmp_name'], '../../assets/' . $imagePath);
            return   $imagePath;
        }
    }

    protected static function randomString($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $str .= $characters[$index];
        }

        return $str;
    }

    protected static function deleteImages($target)
    {

        if (is_dir('../../assets/' . $target)) {
            $files = glob('../../assets/' . $target . '*', GLOB_MARK);
            foreach ($files as $file) {
                self::deleteImages($file);
            }

            rmdir('../../assets/' . $target);
        } elseif (is_file('../../assets/' . $target)) {
            unlink('../../assets/' . $target);
        }
    }
}