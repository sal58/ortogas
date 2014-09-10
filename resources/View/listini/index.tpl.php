<h2>Listini</h2>

<div class="row">
  <div class="col-md-8">
      
<?php if(count($this->listini) > 0): ?>
    <?php foreach ($this->listini as $key => $lObj): ?>
      
      <div class="row row-myig">
        <div class="col-md-12">
            <h3 class="no-margin <?php echo ($lObj->canManageListino()) ? "green" : "text-dark"; ?>"><?php echo $lObj->getDati()->getDescrizione();?></h3>
        </div>
        <div class="col-md-8">
            <p>Produttore: <strong><?php echo $lObj->getDati()->getProduttoreName(); ?></strong></p>
            <h4><span class="text-muted">Prodotti:</span> <?php 
                $categorie = $lObj->getCategorie()->getCatList();
                echo (!is_null($categorie)) ? $categorie : "Nessuno"; 
                ?></h4>
        </div>
        <div class="col-md-4">
        <?php if($lObj->canManageListino()): ?>
            <a role="button" class="btn btn-success" href="/listini/edit/idlistino/<?php echo $lObj->getDati()->getIdListino(); ?>"><span class="glyphicon glyphicon-user"></span> Gestisci Listino</a>
        <?php else: ?>
            <a role="button" class="btn btn-default" href="/listini/view/idlistino/<?php echo $lObj->getDati()->getIdListino(); ?>"><span class="glyphicon glyphicon-search"></span> Visualizza Listino</a>
        <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3>Nessun listino disponibile!</h3>
<?php endif; ?>
      
  </div>
  <div class="col-md-3 col-md-offset-1">
      <a class="btn btn-default btn-mylg" href="/listini/add"><span class="glyphicon glyphicon-plus"></span> Nuovo listino</a>
  </div>
</div>