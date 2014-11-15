    Prezzo: <strong><?php echo $this->prodotto->getDescrizionePrezzo();?></strong><br />
<?php if($this->prodotto->hasPezzatura()): ?>
    [<b>**</b>] <small>Confezione minima: <strong><?php echo $this->prodotto->getDescrizionePezzatura(); ?></strong></small><br />
<?php endif; ?>
