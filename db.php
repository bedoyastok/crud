
<?
//iniciar una sesion para guardar un dato
session_start();
//conexion a la base de datos usando libreria(mysqli_connect)//
//variable para guardar el objeto de conexion//
$conn = mysqli_connect(
    'localhost', //servidor
    'root',//usuario
    'mysql',//contraseña
    'php_mysql_crud'//nombre base datos
);

/* comprobar conexion
if(isset($conn)){
    echo 'DB is connected';
} */
?>