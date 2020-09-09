<html>
 <head>
  <title>
Palidromo
  </title>
 </head>
<body>

<!-- iniciamos creando el formulario donde pondremos la caja de texto que vamos a analizar -->

<form id="miform" name="miform" method="post" action="palindromo.php">
   <center>
      <font size= "6" color ="blue"> <b><i>
         Escriba Una Palabra
      </i></b></font>
      <br>
   <input type="text" value="" name="palabra">
      <br><br>
   <input type="submit" value="Analizar Cadena" name="analizar">
   </center>
   </form>





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
echo "<table border=1> <tr><td bgcolor='green'> <font color='white'><b><i>"; 

   echo "La Palabra Es Palindromo";               

echo" </i></b></font> </td></tr> <tr><td> <font color='blue'><b><i>" ; 
echo"<center>";
   echo $cadena ," = ", $cad2;                    
echo"</center>";
echo" </i></b></font> </td></tr> </table>" ;     
echo"</center>";                                 
}
else                                             
{
echo"<center>";                                 
echo "<table border=1> <tr><td bgcolor='red'> <font color='white'><b><i>"; 
   echo "La Palabra No Es Palindromo";          
echo" </i></b></font> </td></tr> <tr><td> <font color='blue'><b><i>" ;  
echo"<center>";
   echo $cadena ," != ", $cad2;                
echo"</center>";
echo" </i></b></font> </td></tr> </table>" ;   
echo"</center>";                              
}
}
   ?>


