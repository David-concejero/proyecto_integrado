<?php 
// Database configuration 
$dbHost     = "localhost"; 
$dbUsername = "usuario_cine"; 
$dbPassword = "Aabc123."; 
$dbName     = "cine"; 

//fetch.php;

if(isset($_GET["term"]))
{
 $connect = new PDO("mysql:host=localhost; dbname=cine", "usuario_cine", "Aabc123.");
 $connect->exec("set names utf8"); /* Detectar tildes en el nombre de las peliculas https://stackoverflow.com/a/4361485 */

 $query = "
 SELECT * FROM PELICULAS 
 WHERE TITULO LIKE '%".$_GET["term"]."%'";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 $total_row = $statement->rowCount();

 $output = array();
 if($total_row > 0){
  foreach($result as $row){
   $temp_array = array();
   $temp_array['value'] = $row['TITULO'];
   $temp_array['id'] = $row['ID_PELICULA'];
   /* Ruta absoluta, si cambia el nombre del directorio hay que cambiar esto */
   $temp_array['label'] = '<img src="/proyecto_integrado/vista/imagenes/imagenes_portada/'.$row['FOTO_PELICULA'].'" width="70" />&nbsp;&nbsp;&nbsp;'.$row['TITULO'].'';
   $output[] = $temp_array;
  }
 }
 else{
  $output['value'] = '';
  $output['label'] = 'Nada encontrado';
 }

 echo json_encode($output);
}

?>
