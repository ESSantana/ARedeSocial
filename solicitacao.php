<?php 
  session_start();
  include_once 'conexao.php';
  $cod_sessao = $_SESSION['id_user'];

  $sql = "SELECT friendship.id_friend, user.name FROM user JOIN friendship
  on user.id_user = friendship.cod_ask WHERE friendship.status='2' and friendship.cod_answer='$cod_sessao'";

  $retorno = $conexao->query($sql);

  if($registro = $retorno->fetch_array()){
    $nome = $registro['name'];
    $_SESSION['id_friend'] = $registro['id_friend'];

      echo "  <div class=\"w3-col m2\">
                <div class=\"w3-card w3-round w3-white w3-center\">
                  <div class=\"w3-container\">
                    <p>Solicitação de Amizade</p>
                    <img src=\"img/profile.png\" alt=\"Avatar\" style=\"width:50%\"><br>
                    <span>$nome</span>
                    <div class=\"w3-row w3-opacity\">
                      <div class=\"w3-half\">
                        <a href=\"acoes/solicitacao_control.php?selec=1\" class=\"w3-button w3-block w3-green w3-section wid\" title=\"Aceitar\"><i class=\"fa fa-check\"></i></a>
                      </div>
                      <div class=\"w3-half\">
                        <a href=\"acoes/solicitacao_control.php?selec=0\" class=\"w3-button w3-block w3-red w3-section wid\" title=\"Negar\"><i class=\"fa fa-remove\"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <br>";
  }
  

?>


