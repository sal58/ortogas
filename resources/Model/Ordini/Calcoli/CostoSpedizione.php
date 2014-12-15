<?php

/**
 * Description of CostoSpedizione
 * 
 * @author gullo
 */
class Model_Ordini_Calcoli_CostoSpedizione {
    
    private $ocuObj;
    private $cs = null;
    
    function __construct(Model_Ordini_Calcoli_Utenti &$ocuObj) {
        $this->ocuObj = $ocuObj;
    }
    
    function getCostoSpedizioneRipartitoByIduser($iduser) 
    {
        $cs = 0;
        if($this->ocuObj->hasCostoSpedizione() && count($this->ocuObj->getProdottiUtenti()) > 0) 
        {
            $totaleUser = $this->ocuObj->getTotaleByIduser($iduser);
            $costoSpedizione = $this->ocuObj->getCostoSpedizione();
            // GET TOTALE
            $totaleOrdine = 0;
            foreach($this->ocuObj->getProdottiUtenti() AS $iduser => $arU) 
            {
                $totaleOrdine += $this->ocuObj->getTotaleByIduser($iduser);
            }
            // GET COSTO SPEDIZIONE - MEDIA PESATA
            $cs = $totaleUser * $costoSpedizione / $totaleOrdine;
        }
        return $cs;
    }
    
}