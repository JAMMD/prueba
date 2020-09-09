<html>
<head>
  <title>
    Palidromo
  </title>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" ></script>
</head>
<body   >


  <div class="row justify-content-center" >
    <form id="miform" name="miform" method="post" action="index.php">
     <center>
      <font size= "6"  class="list-group">
        <li class="list-group-item">Verificar si es Palindromo</li>

      </font>
      <br>
      <input type="text" class="list-group-item" placeholder="Introduce Palabra" name="palabra">
      <br><br>
      <input type="submit" class="btn btn-primary" value="Analizar Palabra" name="analizar">
    </center>
  </form>
</div>
<?php  

if(isset($_POST['analizar'])) 
{
  $cadena= $_POST['palabra'];    
  $long_cadena =strlen($cadena);
  $i=1;                         
  $cad2='';                    
  while ($i<=$long_cadena)    
  {
    $desc=($long_cadena)-$i;   
    $cad=substr($cadena,$desc,1); 
    $cad2=$cad2.$cad;            
    $i++;                       
  }

  if ($cadena==$cad2)                              
  {

    echo"<center>";                                   
    echo "<table border=2> <tr><td bgcolor='green'> <font color='white'><b><i>"; 
    echo("<h5 >LA PALABRA ".$cadena." ES PALINDROMO</h5>");;          
       // echo $cadena ," = ", $cad2;                    

  }
  else                                             
  {
    echo"<center>";                                 
    echo "<table border=2> <tr><td bgcolor='red'> <font color='white'><b><i>"; 
    echo("<h5 n>LA PALABRA ".$cadena." NO ES PALINDROMO</h5>");;          
    // echo $cadena ," != ", $cad2;                
    
  }
}
?>

