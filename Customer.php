<?php
class Customer {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;

    public function __construct(int $id = 0, string $firstName = "", string $lastName = "", string $email = "") {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    // Getter
    public function __get($property) {
        if (isset($this->$property)) {
            return $this->$property;
        } else {
            echo "{$property} not found";
        }
    }

    // Setter
    public function __set($property, $value) {
        if (isset($this->$property)) {
            $this->$property = $value;
        } else {
            echo "{$property} not found";
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
            else if(strtolower($property) === "fullname") {
                return "Name: {$this->firstName} {$this->lastName}";
            }
        }
        echo "'{$method}' method does not exist.<br>";
    }

    public function __toString(): string {
        return "Name: {$this->firstName} {$this->lastName}<br>ID: {$this->id}<br>Email: {$this->email}";
    }
}
?>