<?php  
   //include('../classes/Painel.php');
    $usuariosOnline = Painel::listarUsuariosOnline();

   
?>



                <div class="container" style="height: 200px; background-color: #F2F2F2;margin-top: 70px;">
                
                <div class="cabeca"  style=" height: 50px; display: flex; align-items: center;">
                  <h5>Painel de Controle - <?php echo NOME_EMPRESA ?> </h5>
                </div>

                    <div class="painel" style=" height: 100px; display: flex; align-items: center; justify-content: space-around;">

                          <div class="caixa-usuario" style="width: 280px;height: 80px;background-color: #F2CB05; ">
                            <div class="frase" style="margin: 10px; color:#F2F2F2">
                              <p>Usuarios Online</p>
                              <p><?php echo count($usuariosOnline); ?></p>
                            </div>
                        </div>
                          
                          <div class="caixa-visita" style="width: 280px;height: 80px;background-color: #F23030;">
                          <div class="frase" style="margin: 10px; color:#F2F2F2">
                              <p>Total de Visitas</p>
                              <p>100</p>
                            </div>
                        </div>

                          <div class="caixa-visitaHoje" style="width: 280px;height: 80px;background-color: #267365;">
                          <div class="frase" style="margin: 10px; color:#F2F2F2">
                              <p>Visitas Hoje</p>
                              <p>3</p>
                            </div>
                    
                    </div>
                  

                </div>
              

                </div>

<div class="container" style="height: 200px; background-color: #F2F2F2;margin-top: 70px;">

<div class="cabeca"  style=" height: 50px; display: flex; align-items: center;">
                  <h5>Painel de Controle - <?php echo NOME_EMPRESA ?> </h5>
                </div>


          
                        <div class="painel" style=" height: 100px; display: flex; align-items: center; justify-content: space-around;">

                        <div class="caixa-usuario" style="width: 280px;height: 80px;">
                            <div class="acao" style="margin: 10px; color: grey">
                            <div class="row">
                                    <div class="col">
                                       <h5>IP</h5>
                                    </div>
                                </div>
                                <?php foreach($usuariosOnline as $key => $value){ ?>
                                <div class="row">
                                    <div class="col">
                                    <span><?php echo $value['ip'] ?></span>
                                    </div>
                                </div>
                                <?php }  ?>
                                
                            </div>
                        </div>
    
                        <div class="caixa-usuario" style="width: 280px;height: 80px; ">
                            <div class="acao" style="margin: 10px; color: grey">
                           
                            <div class="row">
                                <div class="col">
                                    
                                    <h5>Ultima Ação</h5>
                                </div>
                            </div>
                            <?php foreach($usuariosOnline as $key => $value){ ?>
                                <div class="row">
                                    <div class="col">
                                    <span><?php echo date('d/m/Y H:i:s',strtotime ($value['ultima_acao'])) ?></span>
                                    </div>
                                </div>
                                <?php }  ?>
                        </div>


                        </div>
   

</div>



<div class="container" style="height: 200px; background-color: #F2F2F2;margin-top: 70px;">

<div class="cabeca"  style=" height: 50px; display: flex; align-items: center;">
                  <h5>Painel de Usuarios - <?php echo NOME_EMPRESA ?> </h5>
                </div>


          
                        <div class="painel" style=" height: 100px; display: flex; align-items: center; justify-content: space-around;">

                        <div class="caixa-usuario" style="width: 280px;height: 80px;">
                            <div class="acao" style="margin: 10px; color: grey">
                            <div class="row">
                                    <div class="col">
                                       <h5>Nome</h5>
                                    </div>
                                </div>
                                <?php
                                    $usuarioPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
                                    $usuarioPainel->execute();
                                    $usuarioPainel = $usuarioPainel->fetchAll(); 
                                    foreach($usuarioPainel as $key => $value){ ?>
                                <div class="row">
                                    <div class="col">
                                    <span><?php echo $value['nome'] ?></span>
                                    </div>
                                </div>
                                <?php }  ?>
                                
                            </div>
                        </div>
    
                        <div class="caixa-usuario" style="width: 280px;height: 80px; ">
                            <div class="acao" style="margin: 10px; color: grey">
                           
                            <div class="row">
                                <div class="col">
                                    
                                    <h5>Cargo</h5>
                                </div>
                            </div>
                            <?php
                                $usuarioPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
                                $usuarioPainel->execute();
                                $usuarioPainel = $usuarioPainel->fetchAll();
                                 foreach($usuarioPainel as $key => $value){ 
                                ?>
                                <div class="row">
                                    <div class="col">
                                    <span><?php echo pegaCargo($value['cargo']) ?></span>
                                    </div>
                                </div>
                                <?php }  ?>
                        </div>


                        </div>
   

</div>