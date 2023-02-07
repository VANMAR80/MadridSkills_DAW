<?php

require_once("../connection.php");
require ("../class/Publisherclass.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $publisher_name=$_POST["publisher_name"];
   $publisher_addres=$_POST["publisher_addres"];
   $publisher_tlf=$_POST["publisher_tlf"];
   $publisher_web=$_POST["publisher_web"];

   if(empty(trim($publisher_name))){
      echo "Por favor introduce un editor.<br>";
   } 
   if(empty(trim($publisher_addres))){
      echo "Por favor introduce la dirección.<br>";
   } 
   if(empty(trim($publisher_tlf))){
     echo "Por favor introduce el telefono.<br>";
   } 
   if(empty(trim($publisher_web))){
      echo "Por favor introduce la web.<br>";
   } 
   else {
      $editor = new Publisher(0, $publisher_name, $publisher_addres, $publisher_tlf, $publisher_web);

      //Imaginamos que en vez de tomar los datos del formulario enviado por POST para insertarlos en la BBDD, tengo un objeto del que debo extraer sus atributos con sus getters para insertarlos en la BBDD.


      $publisher_name=$editor->get_name();
      $publisher_addres=$editor->get_address();
      $publisher_tlf=$editor->get_telephone();
      $publisher_web=$editor->get_website();
      
   
      $statment=$connection->prepare('INSERT INTO Publisher(id,publisher_name,publisher_addres, publisher_tlf,publisher_web) VALUES(?,?,?,?,?)');
         $id=NULL;
         $statment->bind_param("issis",$id,$publisher_name,$publisher_addres, $publisher_tlf,$publisher_web);
        
         $statment->execute();
         $var = "La editorial se ha añadido correctamente.";
         echo "<script> alert('".$var."'); </script>";
      }
     
       

   }
require("../views/Publisher_view.php");

?>