<?php
class Book {
    private int $isbn;
    private string $title;
    private string $author;
    private int $available;

    public function __construct(int $isbn = 0, string $title = "", string $author = "", int $available = 0) {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->available = $available;
    }

    // Getter
    public function __get($property) {
        if (isset($this->$property)) {
            return $this->$property;
        }
        else {
            echo "'{$property}' not found.<br>";
        }
    }

    //Setter
    public function __set($property, $value) {
        if (isset($this->$property)) {
            $this->$property = $value;
        }
        else {
            echo "'{$property}' not found.<br>";
        }
    }

    // __call() method
    public function __call($method, $arguments) {
        if (strpos($method, 'set') === 0 && strlen($method) > 3) {
            $property = strtolower(substr($method, 3));
            if (property_exists($this, $property)) {
                $this->$property = $arguments[0];
                echo "'{$property}' set to '{$arguments[0]}'.";
                return;
            }
        }
        else if(strpos($method, 'get') === 0 && strlen($method) > 3) {
            $property = strtolower(substr($method, 3));
            if(isset($this->$property)) {
                return $this->$property;
            }
        }
        echo "'{$method}' method does not exist.<br>";
    }

    public function __toString(): string {
        $result =  "Title: {$this->title}<br>Author: {$this->author}<br>ISBN: {$this->isbn}<br>";
        if(!$this->available) {
            $result .= '<b>Not available</b>';
        }
        return $result;
    }

    public function getCopy(): bool {
        if($this->available > 0) {
            $this->available--;
            return true;
        }
        else {
            return false;
        }
    }

    public function addCopy(int $num): bool {
        if($num > 0) {
            $this->available += $num;
            return true;
        }
        else {
            return false;
        }
    }
}
?>