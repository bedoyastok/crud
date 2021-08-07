<?
//conectar con variable $conn
include("db.php");
if(isset($_POST['save_task'])){//boton guardar
    $title = $_POST['title'];//titulo formulario
    $description = $_POST['description'];//descripcion formulario
    
    $query = "INSERT INTO task(title, description) values('$title', '$description')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Query faild");
    }

    //mensaje en boostrap
    $_SESSION['message'] = 'Tarea guardada satisfactoriamente';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}
?>