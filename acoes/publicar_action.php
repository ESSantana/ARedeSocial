<?php
    session_start();
    include_once './../conexao.php';

    date_default_timezone_set("America/Bahia");

    $publish = $_POST['publish'];
    $image = $_POST['image'];
    $data = date("Y/m/d h:i:s");
    $owner = $_SESSION['id_user'];

    

    $sql = "INSERT INTO publish (post,img,data_post,cod_user) VALUES ('$publish','$image','$data','$owner')";

    $resultado = $conexao->query($sql);

    if($resultado){
        echo "<script>
                alert('Post realizado com sucesso!');
                document.location.href = './../painel.php';
            </script>";
    } else {
        echo "<script>
                alert('Erro na postagem!');
                document.location.href = './../painel.php';
            </script>";
    }
?>