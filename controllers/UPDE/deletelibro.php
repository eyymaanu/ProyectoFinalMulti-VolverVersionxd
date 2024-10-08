<?php
 require_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFinalMulti/config/database.php');// Incluir el archivo Database.php para poder instanciar la conexión
 require_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFinalMulti/models/libroModelo.php');// Incluir el archivo autorModelo.php para poder instanciar el modelo de autores

 if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $lib_codigo = $_POST['lib_codigo'];

    try{
        $conn = Database::getConnection();
        $LibroModelo = new LibroModelo($conn);
        if($LibroModelo->eliminarlibro($lib_codigo)){
            header("Location: ../../index.php?page=admin/AgregarLibro");
            exit();
        }else{
            header("Location: ../../index.php?page=admin/AgregarLibro&error=" . urlencode("Error al actualizar el autor"));
            exit();
        }
    }catch(Exception $e){
        echo json_encode(['success' => false, 'message' => 'Ocurrió un error: ' . $e->getMessage()]);
    }
    exit();
}
?>