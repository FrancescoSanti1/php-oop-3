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

        class Computer {
            private $codiceUnivoco;
            private $modello;
            private $prezzo;
            private $marca;

            public function __construct($codiceUnivoco, $prezzo) {
                $this -> setCodiceUnivoco($codiceUnivoco);
                $this -> setPrezzo($prezzo);
            }

            // setter e getter
            public function setCodiceUnivoco($codiceUnivoco) {
                if(strlen($codiceUnivoco) != 6 || !ctype_digit($codiceUnivoco)) {
                    throw new Exception("Il codice è composto da sei cifre.");
                }
                $this -> codiceUnivoco = $codiceUnivoco;
            }
            public function getCodiceUnivoco() {
                return $this -> codiceUnivoco;
            }
            public function setModello($modello) {
                if(strlen($modello) < 3 || strlen($modello) > 20) {
                    throw new Exception("Il nome del modello deve avere una lunghezza compresa tra 3 e 20 caratteri.");
                }
                $this -> modello = $modello;
            }
            public function getModello() {
                return $this -> modello;
            }
            public function setPrezzo($prezzo) {
                if(!is_int($prezzo) || $prezzo < 0 || $prezzo > 2000) {
                    throw new Exception("Il prezzo deve essere un numero intero compreso tra 0 e 2000.");
                }
                $this -> prezzo = $prezzo;
            }
            public function getPrezzo() {
                return $this -> prezzo;
            }
            public function setMarca($marca) {
                if(strlen($marca) < 3 || strlen($marca) > 20) {
                    throw new Exception("Il nome della marca deve avere una lunghezza compresa tra 3 e 20 caratteri.");
                }
                $this -> marca = $marca;
            }
            public function getMarca() {
                return $this -> marca;
            }

            public function printMe() {
                echo $this . '<br>';
            }

            public function __toString() {
                return $this -> getMarca() . ' ' . $this -> getModello() . ': ' . $this -> getPrezzo() . '&euro; [' . $this -> getCodiceUnivoco() . ']';
            }
        }


        // Alcuni test
        try {
            $computer1 = new Computer("654987", 600);
            $computer1 -> setModello("super");
            $computer1 -> setMarca("ASUS");
            $computer2 = new Computer("321654", 850);
            $computer2 -> setModello("space");
            $computer2 -> setMarca("Dell");
        } catch (Exception $e){
            echo "Errore: " . $e -> getMessage() . "<br>";
        }
        
        echo "<br>Elenco dispositivi:<br>";
        $computer1 -> printMe();
        $computer2 -> printMe();
        
        
    ?>

</body>
</html>