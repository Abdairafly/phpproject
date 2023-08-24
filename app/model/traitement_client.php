<?php
include 'functions.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client = $_POST['client'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    

    $client_id = insertClient($client, $adresse, $telephone);

    if ($client_id) {
        echo "Le client a été ajouté avec l'ID : " . $client_id;
    } else {
        echo "Erreur lors de l'ajout du client.";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_demande = $_POST['date_demande'];
    $date_intervention = $_POST['date_intervention'];
    $num_demande = $_POST['num_demande'];
    $intervention_demandee = $_POST['intervention_demandee'];
    $num_chantier = $_POST['num_chantier'];

    $insert_result = insertIntervention($client_id, $date_demande, $date_intervention, $num_demande, $intervention_demandee, $num_chantier);

    if ($insert_result) {
        echo "L'intervention a été ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'intervention.";
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $observations = $_POST['observations']; // Assurez-vous de récupérer les données des observations

    $insert_result = insertObservations($observations); // Appelez la fonction appropriée pour insérer les observations

    if ($insert_result) {
        echo "Les observations ont été enregistrées avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement des observations.";
    }
}



// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $signature_client = $_POST['signature_client']; // Assurez-vous de récupérer les données de la signature
//     $signature_technicien = $_POST['signature_technicien']; // Assurez-vous de récupérer les données de la signature

//     $insert_result = insertSignatures($signature_client, $signature_technicien); // Appelez la fonction appropriée pour insérer les signatures

//     if ($insert_result) {
//         echo "Les signatures ont été enregistrées avec succès.";
//     } else {
//         echo "Erreur lors de l'enregistrement des signatures.";
//     }
// }



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $technicien = $_POST['technicien'];
    $jours = $_POST['jours'];
    $total_heures = $_POST['total_heures'];
    $forfait_deplacement = $_POST['forfait_deplacement'];

    $insert_result = insertTechnicien($technicien, $jours, $total_heures, $forfait_deplacement);

    if ($insert_result) {
        echo "Les informations du technicien ont été ajoutées avec succès.";
    } else {
        echo "Erreur lors de l'ajout des informations du technicien.";
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description_travaux = $_POST['description_travaux'];
    $ref_articles = $_POST['ref_articles'];
    $quantite = $_POST['quantite'];
    $prix_unitaire = $_POST['prix_unitaire'];

    $insert_result = insertTravaux($client_id, $description_travaux, $ref_articles, $quantite, $prix_unitaire);

    if ($insert_result) {
        echo "Les détails des travaux ont été ajoutés avec succès.";
    } else {
        echo "Erreur lors de l'ajout des détails des travaux.";
    }
}
?>
