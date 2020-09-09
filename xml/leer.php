<!DOCTYPE html>
<html>
<head>
   <title>Lectura</title>
   <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" ></script>
</head>
<body>

   <?php

   $filex = $_FILES['myfile']['tmp_name'];
   $xml = simplexml_load_file($filex); 
   $ns = $xml->getNamespaces(true);
   $xml->registerXPathNamespace('cfdi', $ns['cfdi']);
   $xml->registerXPathNamespace('t', $ns['tfd']);

   foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){  } 

   foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {  } 
   ?>
   <div class="container" >
      <div class="row justify-content-center" >
         <table class="table"  >
            <h1>NODO EMISOR </h1>
            
            <thead>
               <tr>
                  <th>RFC</th>
                  <th>NOMBRE</th>
                  
               </tr>
            </thead>

            <tr>
               <td><?php echo $Emisor['Rfc']; ?> </td> <!-- se obtiene fila -->
               <td><?php echo $Emisor['Nombre']; ?> </td>
               
            </tr>
         </table>
      </div>

   </div>
   <div class="container" >

      <div class="row justify-content-center" >
         <table class="table"  >
            <h1>TIMBRE FISCAL DIGITAL </h1>
            
            <thead>
               <tr>
                  <th>FECHA TIMBRADO</th>
                  <th>UUID</th>
                  
               </tr>
            </thead>

            <tr>
               <td><?php  echo $tfd['FechaTimbrado'];  ?> </td>
               <td><?php  echo $tfd['UUID'];  ?> </td>
               
            </tr>
         </table>
      </div>

   </div>




</body>
</html>

