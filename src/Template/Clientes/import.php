<?php
require_once( "db.php" );
 
$data = array();
 
//$db =& DB::connect("mysql://root@localhost/names", array());
$db = @mysql_connect('localhost', 'root', '') or die ( mysql_error() );
mysql_select_db('all-backs', $db);




 
function add_person($nome,$documento,	
$cep,	$endereco,	$bairro,
	$cidade,	$uf,	
	$telefone,	$email,	$ativo
 )
{
 global $data, $db;
 
 $query = sprintf( 
        'INSERT INTO clientes VALUES( "", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s","%s",now(),now(),"1", "S" )' ,
          mysql_real_escape_string($nome),
        mysql_real_escape_string($documento),
        mysql_real_escape_string($cep),
        mysql_real_escape_string($endereco),
        mysql_real_escape_string($bairro),
        mysql_real_escape_string($cidade),
        mysql_real_escape_string($uf),
        mysql_real_escape_string($telefone),
        mysql_real_escape_string($email),
        mysql_real_escape_string($ativo)
    );


mysql_query($query, $db);

 
 $data []= array(
   'nome' => $nome       ,       
'documento' => $documento  ,  
'cep' => $cep        ,        
'endereco' => $endereco   ,   
'bairro' => $bairro     ,     
'cidade' => $cidade     ,     
'uf' => $uf,
'telefone' => $telefone   ,   
'email' => $email      ,      
'ativo' => $ativo          
 );
}
 
if ( $_FILES['file']['tmp_name'] )
{
 $dom = DOMDocument::load( $_FILES['file']['tmp_name'] );
 $rows = $dom->getElementsByTagName( 'Row' );
 $first_row = true;
 foreach ($rows as $row)
 {
   if ( !$first_row )
   {
      $nome= '';     
 $documento= '';
 $cep= '';      
 $endereco = '';
 $bairro   = '';
 $cidade   = '';
 $uf= '';
 $telefone = '';
 $email = '';   
 $ativo   = ''; 
 
     $index = 1;
     $cells = $row->getElementsByTagName( 'Cell' );
     foreach( $cells as $cell )
     {
       $ind = $cell->getAttribute( 'Index' );
       if ( $ind != null ) $index = $ind;
 
        if ( $index == 1 ) $nome = $cell->nodeValue;
 if ( $index == 2 ) $documento = $cell->nodeValue;
 if ( $index == 3 ) $cep = $cell->nodeValue;
 if ( $index == 4 ) $endereco = $cell->nodeValue;
 if ( $index == 5 ) $bairro = $cell->nodeValue;
 if ( $index == 6 ) $cidade = $cell->nodeValue;
 if ( $index == 7 ) $uf = $cell->nodeValue;
 if ( $index == 8 ) $telefone = $cell->nodeValue;
 if ( $index == 9 ) $email  = $cell->nodeValue;
 if ( $index == 10 ) $ativo = $cell->nodeValue;
 
       $index += 1;
     }
     add_person( $nome,$documento,	
$cep,	$endereco,	$bairro,
	$cidade,	$uf,	
	$telefone,	$email,	$ativo );
   }
   $first_row = false;
 }
}
?>
<html>
<body>
These records have been added to the database:
<table>
<tr>
<th>First</th>
<th>Middle</th>
<th>Last</th>
<th>Email</th>
</tr>
<?php foreach( $data as $row ) { ?>
<?php echo print_r($row);?>

<?php } ?>
</table>
Click <a href="list.php">here</a> for the entire table.
</body>
</html>