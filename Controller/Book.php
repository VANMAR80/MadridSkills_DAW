<?php
require_once("../connection.php");
require ("../class/Bookclass.php");
require ("../class/Publisherclass.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $book_title=$_POST["book_title"];
   $book_pages=$_POST["book_pages"];
   $book_price=$_POST["book_price"];
   $book_chapters=$_POST["book_chapters"];
   $book_author=$_POST["book_author"];
   $book_editor=$_POST["book_editor"]; //id

   if(empty(trim($book_title))){
      echo "Por favor introduce un título.<br>";
   } 
   if(empty(trim($book_pages))){
      echo "Por favor introduce el número de páginas.<br>";
   } 
   if(empty(trim($book_price))){
     echo "Por favor introduce el precio.<br>";
   } 
   if(empty(trim($book_chapters))){
      echo "Por favor introduce el número de capítulos.<br>";
   } 
   if(empty(trim($book_author))){
      echo "Por favor introduce el autor.<br>";
   }
   else {
	  	$query = $connection -> query ("SELECT * FROM publisher WHERE id=$book_editor");

	  	while ($value = mysqli_fetch_array($query)) {

	  		$book_editor=new Publisher($value['id'], $value['publisher_name'], $value['publisher_addres'], $value['publisher_tlf'],$value['publisher_web']);
	  	
		}
	 
	$book = new Book(0, $book_title, $book_pages, $book_price, $book_editor,$book_chapters,$book_author);


   //Vamos a suponer a modo práctico que los atributos del objeto Book no vienen del formulario sino de un objeto pasado por otra web o de un objeto creado a partir de un json 

	$id=$book->get_id();
	$book_title=$book->get_title();
	$book_pages=$book->get_pages();
	$book_price=$book->get_price();
	$book_editor=$book->get_editor();

	$book_chapters=$book->get_chapters();
	$book_author=$book->get_authors();

   $book_editor2=json_encode($book_editor); 

      //Creamos un archivo json para introducirlo en la BBDD. Debemos cambiar las propiedades de las variables de Publisher de private a public, sino json_encode crea un json vacío {}
  

    $sql1 = "INSERT INTO book(id,book_title,book_pages,book_price,book_editor,book_chapters,book_author) VALUES(null,'$book_title','$book_pages','$book_price','$book_editor2','$book_chapters','$book_author')";

    //Si ponemos la columna book_editor en la tabla de Book como json, me podré traer ese archivo desde la BBDD con un select y usar json_decode() para tener el objeto Publisher de nuevo.

	$connection->query($sql1);
   $var = "El libro se ha añadido correctamente.";
         echo "<script> alert('".$var."'); </script>";
    }       

   }

require("../views/Book_view.php");