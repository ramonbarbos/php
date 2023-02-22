

<div id="container-lateral" >

    <div class="caixa mt-4 mb-5" style="width: 18rem; height: 10rem;background-color:  #c6cecf">

        <div class="titulo mt-3">
            Realizar uma busca:
        </div>

        <form  role="search">
        <input class="form-control mt-2" type="search" placeholder="O que deseja procurar?" aria-label="Search">
        <button class="btn btn-outline-success mt-3" type="submit">Pesquisar</button>
        </form>

    </div>

    
    <div class="caixa mt-4 mb-4" style="width: 18rem; height: 8rem;">

        <div class="titulo mt-3">
           
            
            Selecionar categoria:
             
        </div>
      
        <form >
            <select class="form-control mt-2"  name="categoria">


            <option value="" selected="">Todas as categorias</option>

            <?php
                 $categorias = Painel::selectAll('tb_site.categoria');
                 foreach($categorias as $key => $value) {

             ?>
               <option <?php if($value['slug'] == @$url[1]) echo 'selected'; ?> value="<?php echo $value['slug'] ?>"><?php echo $value['nome']; ?></option>
               
              <?php } ?>
          
           
            </select>

        </form>

    </div>

</div>