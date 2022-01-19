<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Es. PHP OOP 3</title>
</head>
<body>
    <?php

        class User {
            private $username;
            private $password;
            private $age;

            public function __construct($username, $password) {
                $this -> setUsername($username);
                $this -> setPassword($password);
            }

            public function setUsername($username) {
                if(strlen($username) < 3 || strlen($username) > 16) {
                    throw new Exception("Il nome utente deve avere una lunghezza compresa tra 3 e 16 caratteri.");
                }
                $this -> username = $username;
            }
            public function getUsername() {
                return $this -> username;
            }
            public function setPassword($password) {
                if(ctype_alnum($password)) {
                    throw new Exception("La password deve contenere almeno un carattere speciale.");
                }
                $this -> password = $password;
            }
            public function getPassword() {
                return $this -> password;
            }
            public function setAge($age) {
                if(!is_int($age)) {
                    throw new Exception("L'età va espressa in cifre.");
                }
                $this -> age = $age;
            }
            public function getAge() {
                return $this -> age;
            }

            public function printMe() {
                echo $this . '<br>';
            }

            public function __toString() {
                return $this -> getUsername() . ': ' . $this -> getAge() . ' [' . $this -> getPassword() . ']';
            }
        }


        // Alcuni test
        try {
            $user1 = new User("usernomeuno", "sua!Password");
            $user1 -> setAge(34);
            $user2 = new User("userDue", "a?ltraPassword");
            $user2 -> setAge(22);
        } catch (Exception $e){
            echo "Errore: " . $e -> getMessage() . "<br>";
        }
        
        echo "<br>Elenco utenti:<br>";
        $user1 -> printMe();
        $user2 -> printMe();
        
        
    ?>

</body>
</html>