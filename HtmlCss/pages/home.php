<section class="banner-principal">
        <div class="center-wp">
            <form action="">
                <h2>Qual o seu melhor e-mail?</h2>
                <input class="form-control" type="text" name="email" required>
                <div class="btn"><input class="btn btn-dark" type="submit" name="acao"  value="Cadastrar" ></div>
            </form>
        </div><!--CENTER-->
    </section> <!--PRINCIPAL-->


    <section class="container" style="height: 85vh; display:flex;align-items: center;">
        <div class="center-a">
            <div class="w50-t">
                <h2>Ramon Barbosa</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque necessitatibus voluptas deleniti explicabo nobis natus inventore molestiae, quos deserunt ea recusandae minus sunt voluptate labore aspernatur facilis dignissimos nesciunt ut.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque necessitatibus voluptas deleniti explicabo nobis natus inventore molestiae, quos deserunt ea recusandae minus sunt voluptate labore aspernatur facilis dignissimos nesciunt ut.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque necessitatibus voluptas deleniti explicabo nobis natus inventore molestiae, quos deserunt ea recusandae minus sunt voluptate labore aspernatur facilis dignissimos nesciunt ut.</p>

            </div>
            <div class="w50-f">
                <img src="img/foto.jpg" alt="" style="height: 300px;width: 300px;">

            </div>
    </div><!--CENTER-->
    </section><!--DESCRICAO-->

    <section class="container" style="background-color: #262626 ;color: white;height: 85vh; display:flex;align-items: center;">
        <div class="center-a">

        <?php 
         $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site.depoimentos`   ORDER BY order_id ASC LIMIT 3");
         $sql->execute();
        $depoimentos = $sql->fetchAll();
        foreach($depoimentos as $key => $value) {
        ?>
            <div class="w50-t">
                <h2><?php echo $value['nome']; ?></h2>
                <p><?php echo $value['depoimento']; ?></p>
                <p><?php echo $value['data']; ?></p>

            </div>
            <?php } ?>
          
    </div><!--CENTER-->
    </section><!--DESCRICAO-->