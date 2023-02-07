<?php
require_once("../connection.php");
require ("../class/Magazine_class.php");
require ("../class/Publisherclass.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $magazine_title=$_POST["magazine_title"];
   $magazine_pages=$_POST["magazine_pages"];
   $magazine_price=$_POST["magazine_price"];
  
   $additional_resources=$_POST["additional_resources"];
   $magazine_editor=$_POST["magazine_editor"]; //id

   if(empty(trim($magazine_title))){
      echo "Por favor introduce un título.<br>";
   } 
   if(empty(trim($magazine_pages))){
      echo "Por favor introduce el número de páginas.<br>";
   } 
   if(empty(trim($magazine_price))){
     echo "Por favor introduce el precio.<br>";
   } 
   if(empty(trim($additional_resources))){
      echo "Por favor introduce información adicional.<br>";
  
   }
   else {
	  	$query = $connection -> query ("SELECT * FROM publisher WHERE id=$magazine_editor");

	  	while ($value = mysqli_fetch_array($query)) {

	  		$magazine_editor=new Publisher($value['id'], $value['publisher_name'], $value['publisher_addres'], $value['publisher_tlf'],$value['publisher_web']);

	  	
	}

	 
	$magazine = new Magazine(0, $magazine_title, $magazine_pages, $magazine_price, $magazine_editor,$additional_resources);

	print_r($magazine);
   //Vamos a suponer a modo práctico que los atributos del objeto Book no vienen del formulario sino de un objeto pasado por otra web o de un objeto creado a partir de un json 

	$id=$magazine->get_id();
	$magazine_title=$magazine->get_title();
	$magazine_pages=$magazine->get_pages();
	$magazine_price=$magazine->get_price();
	$magazine_editor=$magazine->get_editor();

	$magazine_chapters=$magazine->get_additionalResources();


   $magazine_editor2=json_encode($magazine_editor); 

      //Creamos un archivo json para introducirlo en la BBDD. Debemos cambiar las propiedades de las variables de Publisher de private a public, sino json_encode crea un json vacío {}
  

    $sql1 = "INSERT INTO magazine(id,magazine_title,magazine_pages,magazine_price,additional_resources,magazine_editor) VALUES(null,'$magazine_title','$magazine_pages','$magazine_price','$additional_resources','$magazine_editor2')";

    //Si ponemos la columna book_editor en la tabla de Book como json, me podré traer ese archivo desde la BBDD con un select y usar json_decode() para tener el objeto Publisher de nuevo.

	$connection->query($sql1);
   $var = "La revista se ha añadido correctamente.";
         echo "<script> alert('".$var."'); </script>";
    }       

   }


require("../views/Magazine_view.php");