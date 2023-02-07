

<html>

<head>
    <title>Añadir Libro</title>
    <meta charset="utf-8">
   
</head>
<body>
<div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <h2>Añadir Libro</h2>
            
        <div>
            <label>Title</label>
            <input type="text" name="book_title" value="<?php if(isset($book_title)) echo $book_title?>">         
        </div>
<br>
        <div>
            <label>Pages</label>
            <input type="text" name="book_pages" value="<?php if(isset($book_pages)) echo $book_pages?>">   
        </div>
<br>
        <div>
            <label>Price</label>
            <input type="int" name="book_price" value="<?php if(isset($book_price)) echo $book_price?>">       
        </div>
        <br>
        <div>
            <label>Chapters</label>
            <input type="string" name="book_chapters" value="<?php if(isset($book_chapters)) echo $book_chapters?>">      
        </div>
<br>
        <div>
            <label>Author</label>
            <input type="string" name="book_author" value="<?php if(isset($book_author)) echo $book_author?>">      
        </div>
<br>

        <div>
            <label>Editor</label>
            <select name="book_editor" class="form-control" >
				<option value="">Seleccione:
				<?php
				include_once('../connection.php');

                //Sería más elegante poner una función a la que llamemos para traernos los datos de la BBDD la tabla Publisher.
                
				 $query = $connection -> query ("SELECT * FROM Publisher ORDER BY publisher_name");
				 //ordenar alfabeticamente
          		while ($value = mysqli_fetch_array($query)) {
          		
          			echo '<option value="'.$value['id'].'">'.$value['publisher_name'].'</option>';
                }
			?>
			</select>     
        </div>
<br>
        <div>
            <input type="submit" class="btn btn-primary" value="Insert">
        </div>
        </form>
<div>
<a href="../index.php">
    <button>Back</button>
  </a> 
</div>
      
</body>
</html>