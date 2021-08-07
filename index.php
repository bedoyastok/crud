<!-- conectar con la base de datos -->
<?include("db.php")?>
<!-- conectar con el archivo header -->
<?include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!-- validar con mensaje emergente -->
            <?if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?=$_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?session_unset();}?><!--eliminar variables,cerrar sesion, limpiar datos-->

            <div class="card card-body">
                <!-- eviar a el archivo de action por metodo POST-->
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control"
                        placeholder="Task Title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                        placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block"
                    name="save_task" value="Save Task">
                </form>    
            </div>
        </div>
        <div classs="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <!--consulta para pedir los datos de la tabla task-->
                    <?
                    $query="SELECT * FROM task";
                    $result_tasks=mysqli_query($conn,$query);
                //para imprimir la informacion en la tabla
                    while($row=mysqli_fetch_array($result_tasks)){?>
                        <tr>
                            <td><?echo $row['title']?></td>
                            <td><?echo $row['description']?></td>
                            <td><?echo $row['created_at']?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    

<!-- conectar con el footer -->
<?include("includes/footer.php")?>

  
