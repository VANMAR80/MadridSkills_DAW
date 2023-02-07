<?php

        //Podríamos ponerlo dentro de una clase y usar DEFINE para los parámetros para que si hay que cambiarlo sólo se haga una vez.

        $connection = new mysqli("localhost", "root", "", "bookstore");
        
        if ( $connection->errno ) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            return $connection;
           
        }


