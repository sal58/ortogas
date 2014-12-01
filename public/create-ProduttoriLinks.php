<?php

/**
 * Procedura CREATE PRODUTTORI LINKS
 */
        
        
        $dsn = 'mysql:host=localhost;dbname=m4ssbtdh_re-igruppi';
        $db = new PDO($dsn, "m4ssbtdh_reig", "zSCcAzTiT88r", array());
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $idproduttore = 23;
        
        // corrispondenze subcat
        $myProduttori = array(
            "Az. Agric. GIOL - San Polo in Piave (TV)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEblEzNjNGdTdVbms",
            "Az. Agric. GRADIZZOLO - Monteveglio (BO)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEbS1YRUFaUEc4TE0",
            "IL FARNETO Soc. Agric. - Castellarano (RE)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEX19ja0FnZzkwMzR5VFktWWEzazJBSnd5TGkw",
            "Az. Agric. FOLICELLO - Castelfranco Emilia (MO)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEZ2JZeTNNVURLRlU",
            "Az. Agric. MAGNANI ADRIANO - Bertinoro (FC)" => "https://docs.google.com/file/d/0B5B-cQyaCYbERnYyNlZQaTd3NW8",
            "Az. Agric. CENTANNI - Montefiore dell'Aso (AP)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEeEN3dWtVcUdIWUE",
            "Podere GUADO AL MELO - Bolgheri (LI)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEVTdMS2JiZmFUWUU",
            "Sicilia Vostra - Coop Terramatta, Sicilia" => "https://docs.google.com/file/d/0B5B-cQyaCYbEcFF2YzVSdkhGa00",
            "CASCINA TAVIJN - Scurzolengo (AT)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEVnF3VmhUWnNSZnM",
            "Az. Agric. LA COLLINA - Codemondo (RE)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEUTI3OTR1S2JOLTA",
            "Az. Agric. PAOLO ROTA (RE)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEeWJJZHBXeW1MSE0",
            "Az. Agric. CINQUECAMPI - Puianello (RE)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEVE5pbkhvQ3FpWFk",
            "Tenuta SAN VITO - Montelupo Fiorentino (FI)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEdmlDb1pIcHphQWs",
            "BERA VITTORIO - ASTI " => "https://docs.google.com/file/d/0B5B-cQyaCYbEVXYtcHF4RW9RRVk",
            "Az. Agric. LA DISTESA - Cupramontana (AN)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEeUx4OWhBZ2dHRWM",
            "Az. Agric. Endrizzi Elio e F.lli S.S. - Mezzocorona (TN)" => "https://docs.google.com/file/d/0B5B-cQyaCYbEYmRheUFWWGFhQXc",
            "Sicilia Vostra, Sicilia" => "https://docs.google.com/file/d/0B5B-cQyaCYbEcFF2YzVSdkhGa00",            
        );
        
        
            $sth_app = $db->prepare("SELECT * FROM prodotti WHERE idproduttore= :idproduttore AND attivo='S'");
            $sth_app->execute(array('idproduttore' => $idproduttore));
            $prodotti = $sth_app->fetchAll(PDO::FETCH_OBJ);
            foreach ($prodotti as $prodotto) 
            {
                if(isset($myProduttori[$prodotto->note]))
                {
                    $produttore = htmlspecialchars($prodotto->note, ENT_QUOTES);
                    $note = '<a href="'.$myProduttori[$prodotto->note].'" target="_blank">'.$produttore.'</a>';
                    // UPDATE
                    $db->query("UPDATE prodotti SET note='$note' WHERE idprodotto='$prodotto->idprodotto'");
                } else {
                    echo "NON TROVATO ID $prodotto->idprodotto : $prodotto->descrizione<br>";
                }
            }
            
        