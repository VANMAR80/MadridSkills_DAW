<html>

<head>
    <title>Añadir Editor</title>
    <meta charset="utf-8">
   
</head>
<body>
<div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <h2>Añadir Editor</h2>
            
        <div>
            <label>Name</label>
            <input type="text" name="publisher_name" value="<?php if(isset($publisher_name)) echo $publisher_name?>">         
        </div>
<br>
        <div>
            <label>Address</label>
            <input type="text" name="publisher_addres" value="<?php if(isset($publisher_addres)) echo $publisher_addres?>">   
        </div>
<br>
        <div>
            <label>Telephone</label>
            <input type="int" name="publisher_tlf" value="<?php if(isset($publisher_tlf)) echo $publisher_tlf?>">       
        </div>
<br>
        <div>
            <label>WebSite</label>
            <input type="string" name="publisher_web" value="<?php if(isset($publisher_web)) echo $publisher_web?>">      
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