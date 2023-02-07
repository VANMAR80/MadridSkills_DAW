<!DOCTYPE html>
<html>
<head>
	<title>Práctica 7</title>
</head>
<body>
<h1>Práctica 7 </h1>
<?php
abstract class ReadingMaterial{
	private int $id;
	private string $title;
	private int $pages;
	private int $price;
	private object $editor;
	function __construct($id, $title, $pages, $price, $editor){
		$this-> id=$id;
		$this-> title=$title;
		$this-> pages=$pages;
		$this-> price=$price;
		$this-> editor=$editor;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_id($id_new){
		return $this->id=$id_new;
	}
	public function get_title(){
		return $this->title;
	}
	public function set_title($title_new){
		return $this->title=$title_new;
	}
	public function get_pages(){
		return $this->pages;
	}
	public function set_pages($pages_new){
		return $this->pages=$pages_new;
	}
	public function get_price(){
		return $this->price;
	}
	public function set_price($price_new){
		return $this->price=$price_new;
	}
	public function get_editor(){
		return $this->editor;
	}
	public function set_editor($editor_new){
		return $this->editor=$editor_new;
	}
}

class Book extends ReadingMaterial {
	private int $chapters;
	private string $authors;
	function __construct($id, $title, $pages, $price, $editor, $chapters, $authors){
		parent::__construct($id, $title, $pages, $price, $editor);
		$this->chapters = $chapters;
		$this->authors = $authors;
	}
	public function get_chapters(){
		return $this->chapters;
	}
	public function set_chapters($chapters_new){
		return $this->chapters=$chapters_new;
	}
	public function get_authors(){
		return $this->authors;
	}
	public function set_authors($authors_new){
		return $this->authors=$authors_new;
	}
}

class Magazine extends ReadingMaterial {
	private string $additionalResources;
    function __construct($id, $title, $pages, $price, $editor, $additionalResources){
    	parent::__construct($id, $title, $pages, $price, $editor);
    	$this->additionalResources = $additionalResources;
    }
    public function get_additionalResources(){
		return $this->additionalResources;
	}
	public function set_additionalResources($additionalResources_new){
		return $this->additionalResources=$additionalResources_new;
	}
}

class Publisher{
	private int $id;
	private string $name;
	private string $address;
	private int $telephone;
	private string $website;
	function __construct($id, $name, $address, $telephone, $website){
		$this-> id=$id;
		$this-> name=$name;
		$this-> address=$address;
		$this-> telephone=$telephone;
		$this-> website=$website;
	}
	public function get_id(){
		return $this->id;
	}
	public function set_id($id_new){
		return $this->id=$id_new;
	}
	public function get_name(){
		return $this->name;
	}
	public function set_name($name_new){
		return $this->name=$name_new;
	}
	public function get_address(){
		return $this->address;
	}
	public function set_address($address_new){
		return $this->address=$address_new;
	}
	public function get_telephone(){
		return $this->telephone;
	}
	public function set_telephone($telephone_new){
		return $this->telephone=$telephone_new;
	}
	public function get_website(){
		return $this->website;
	}
	public function set_website($website_new){
		return $this->website=$website_new;
	}
}

//Ejercicio 1

$editor = new Publisher(777, 'Algani Editorial', 'C/Fantasma 29', 912842765, 'www.alganied.com');
$book = new Book(9394, 'La riqueza de las naciones', 207, 15, $editor, 5, 'Adam Smith');
$book1 = new Book(1111, 'Padre rico, padre pobre', 198, 39, $editor, 11, 'Robert T.');
$book2 = new Book(0000, 'Libro3', 128, 12, $editor, 10, 'Roger');

$Array_book=array($book,$book1,$book2);

function bubbleSort(array $Array_book, bool $asc){
	$size=count($Array_book);
	for($last=$size-1; $last>0;$last=$last-1){
		for($current=0;$current<$last;$current=$current+1){
			if($asc){
				if($Array_book[$current]->get_price()>$Array_book[$current+1]->get_price()){
					$temp=$Array_book[$current];
					$Array_book[$current]=$Array_book[$current+1];
					$Array_book[$current]=$temp;
				}
			}else{
				if($Array_book[$current]->get_price()<$Array_book[$current+1]->get_price()){
					$temp=$Array_book[$current];
					$Array_book[$current]=$Array_book[$current+1];
					$Array_book[$current+1]=$temp;
				}
			}
		}
	}
return $Array_book;
}

$asc = false;

echo "<b>Ejercicio 1:</b><br>";
echo "Así quedan los libros ordenados por su precio de forma descendente: <br>";
print_r(bubbleSort($Array_book,$asc));

echo "<br>";

echo "Así quedan los libros ordenados por su precio de forma ascendente: <br>";
$asc = true;
print_r(bubbleSort($Array_book,$asc));
echo "<br>";
//Ejercicio2
echo "<br><b>Ejercicio 2:</b><br>";

$book3 = new Book(2222, 'Carte', 118, 16, $editor, 21, 'Desconocido');
$book4 = new Book(3333, 'Otro', 108, 9, $editor, 1, 'Massimo');

$Array_book2=array($book,$book1,$book2,$book3,$book4);

function sortLibros($array){
	for ($i=1; $i<count($array); $i++) {

        for ($j=0; $j<count($array)-$i; $j++) {
        	if ($array[$j]->get_title() > $array[$j+1]->get_title()) {
	            	$k=$array[$j+1];
	            	$array[$j+1]=$array[$j];
	            	$array[$j]=$k;
            	}
        }
    }
    return $array;
}


$sortAlp=sortLibros($Array_book2);

echo "Así quedan los libros ordenados por orden alfabético según su título: <br>";
print_r(sortLibros($Array_book2));
echo "<br>";
//Ejercicio 3
echo "<br><b>Ejercicio 3:</b><br>";

//Función para buscar autor del libro
function buscarAutor(array $book, $autor){
	
    foreach($book as $libro){
    	
        if($libro->get_authors()==$autor){
          
           return $libro->get_authors();
            
        }
    }
    
}

//Función para buscar título del libro
function buscarTitulo(array $book, string $titulo){
	$found=false;
    foreach($book as $libro){
        if($libro->get_title()== $titulo){
            $found=true;               
        }       	
    }
    if($found=="true"){echo "Encontrado!";}
    else{echo 'El título no se encuentra en el array';}   
}


//Pruebas para buscar autores usando la función buscarAutor

echo "Pruebas para buscar autores usando la función buscarAutor. <br>";

echo buscarAutor($Array_book2,'Adam Smith'). ' en el array.<br>';
echo buscarAutor($Array_book2,'Desconocido').' en el array.<br>';
echo buscarAutor($Array_book2,'verrrbrr');



//Pruebas para buscar títulos usando la función buscarTitulo
echo "Pruebas para buscar títulos usando la función buscarTitulo. <br>";
echo "Voy a buscar el título Padre rico, padre pobre, que se encuentra en el array. <br>";
buscarTitulo($Array_book2, 'Padre rico, padre pobre');
echo "<br>";

echo "Voy a buscar una serie de letras que no corresponden con un título:";
echo "<br>";
buscarTitulo($Array_book2, 'niuh');


?>
</body>
</html>