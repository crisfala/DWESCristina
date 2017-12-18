<?php 
        echo " <h1>17.Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas
        que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando
        únicamente 5 asientos)</h1>";
        $salaCine [8][2]='Maria';
        $salaCine[3][7]='Ignacio';
        $salaCine[2][3]='Marta';
        $salaCine[1][4]='Alicia';
        $salaCine[5][7]='Roberto';
    
    
    for ($fila = 0;$fila < 20;$fila++)      //digo cuantas filas hay en el cine
    {
        for($colum = 0;$colum< 15;$colum++)     //digo cuantas columnas hay en el cine
        {
            if (!empty($salaCine[$fila][$colum])==true)
            {
            echo "Fila: ".$fila." Columna: ".$colum." Nombre: ".$salaCine[$fila][$colum]."<br>";
            }
        }
    }
    
    