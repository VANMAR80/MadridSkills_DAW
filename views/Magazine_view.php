

<html>

<head>
    <title>Añadir Revista</title>
    <meta charset="utf-8">
   
</head>
<body>
<div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <h2>Añadir Revista</h2>
            
        <div>
            <label>Title</label>
            <input type="text" name="magazine_title" value="<?php if(isset($magazine_title)) echo $magazine_title?>">         
        </div>
<br>
        <div>
            <label>Pages</label>
            <input type="text" name="magazine_pages" value="<?php if(isset($magazine_pages)) echo $magazine_pages?>">   
        </div>
<br>
        <div>
            <label>Price</label>
            <input type="int" name="magazine_price" value="<?php if(isset($magazine_price)) echo $magazine_price?>">       
        </div>
        <br>
       
        <div>
            <label>Additional Resources</label>
            <input type="string" name="additional_resources" value="<?php if(isset($additional_resources)) echo $additional_resources?>">      
        </div>
<br>

        <div>
            <label>Editor</label>
            <select name="magazine_editor" class="form-control" >
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