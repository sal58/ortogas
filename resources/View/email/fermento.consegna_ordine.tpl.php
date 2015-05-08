Ciao <?php echo $this->ordine["nome"]; ?> <?php echo $this->ordine["cognome"]; ?>,<br />
ti informiamo che <b>VENERDI’ 19/12/2014 dalle 18 alle 20</b> puoi ritirare il tuo ordine DI VINO c/o il CAMELOT BISTROT 
(dove abbiamo fatto la serata di presentazione del progetto) in <a href="https://www.google.it/maps/place/Parco+Rochdale/@44.734076,10.663115,17z/data=!3m1!4b1!4m2!3m1!1s0x47801e7cb8643869:0x37a1b999003c736a">via Rochdale 1 a Pratofontana (RE)</a>. 
Per l'occasione allestiremo anche un banchetto con qualche assaggio dei vini dei nostri produttori!<br />
In caso fossi impossibilitato al ritiro ti preghiamo di segnalarcelo tempestivamente a questo indirizzo mail 
(e cmq non oltre mercoledì 17/12/2014).<br />
In allegato puoi trovare il dettaglio di quanto ordinato comprensivo di quota associativa per l’anno 2015 
e piccolo contributo per le spese di spedizione.<br />
Il <b>pagamento</b> dovrà avvenire <b>IN CONTANTI</b> al momento del ritiro.<br />
<br />
A presto!<br />
Fermento Naturale<br />
<br />
<br />
Riepilogo del tuo ordine:<br />
<br />
<table class="table table-condensed">
    <thead>
      <tr>
        <th>Qta</th>
        <th>Codice</th>
        <th>Prezzo unitario</th>
        <th>Descrizione</th>
        <th class="text-right">Totale</th>
      </tr>
    </thead>
    <tbody>
<?php 
    $arWithMultip = Model_Prodotti_UdM::getArWithMultip();
    foreach ($this->ordine["prodotti"] AS $idprodotto => $pObj): ?>
    <?php if($pObj->isDisponibile()): ?>
        <tr>
    <?php else: ?>
        <tr style="background-color: #f2dede; text-decoration: line-through;">
    <?php endif; ?>
            <td><strong><?php echo $pObj->getQtaReale();?> <?php echo (isset($arWithMultip[$pObj->udm]) ? $arWithMultip[$pObj->udm]["label"] : $pObj->udm ); ?> </strong></td>
            <td><?php echo $pObj->codice;?></td>
            <td><?php echo $pObj->getDescrizionePrezzo();?></td>
            <td><?php echo $pObj->descrizione;?></td>
            <td class="text-right"><strong><?php echo $this->valuta($pObj->getTotale()); ?></strong></td>
        </tr>        
<?php endforeach; ?>
<?php if($this->ordCalcObj->hasCostoSpedizione() && $this->ordCalcObj->getTotaleByIduser($this->iduser)): ?>
        <tr style="background-color: #fcf8e3;">
            <td colspan="3">&nbsp;</td>
            <td><b>Contributo spese di spedizione</b></td>
            <td class="text-right"><strong><?php echo $this->valuta($this->ordCalcObj->getSpedizione()->getCostoSpedizioneRipartitoByIduser($this->iduser)); ?></strong></td>
        </tr>
<?php endif; ?>
<?php if(!in_array($this->iduser, $this->arSoci)): 
    // NON SOCIO
    $totale = $this->ordCalcObj->getTotaleConSpedizioneByIduser($this->iduser) + 15;
?>        
        <tr style="background-color: #fcf8e3;">
            <td colspan="3">&nbsp;</td>
            <td><b>Quota associativa Anno 2015</b></td>
            <td class="text-right"><strong><?php echo $this->valuta(15); ?></strong></td>
        </tr>
<?php else: 
    // SOCIO
    $totale = $this->ordCalcObj->getTotaleConSpedizioneByIduser($this->iduser);
endif; ?>        
        <tr style="background-color: #dff0d8;">
            <td colspan="3">&nbsp;</td>
            <td><b>Totale</b></td>
            <td><strong><?php echo $this->valuta($totale); ?></strong></td>
        </tr>
    </tbody>
</table>        
