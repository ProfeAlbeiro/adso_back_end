            <?php
                // Cadena de Texto
                $nombre = "Cadena de Texto";
                echo $nombre . " -> " . gettype($nombre) . "<br>";
                // Caracter es una Cadena de Texto
                $nombre = 'x';
                echo $nombre . " -> " . gettype($nombre) . "<br>";
                // Entero
                $nombre = 156;
                echo $nombre . " -> " . gettype($nombre) . "<br>";
                // Flotante
                $nombre = 156.45;
                echo $nombre . " -> " . gettype($nombre) . "<br>";
                // Booleano
                $nombre = True;
                echo $nombre . " -> " . gettype($nombre) . "<br>";
            ?>