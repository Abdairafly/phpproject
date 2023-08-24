
<?php
function connectToDatabase() {
    $serveur = "myprojects";
    $utilisateur = "root";
    $motDePasse = "";
    $baseDeDonnees = "formulaire_plomb";

    $connexion = mysqli_connect($serveur, $utilisateur, $motDePasse, $baseDeDonnees);

    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    }

    return $connexion;
}

function insertClient($nom, $adresse, $telephone) {
    $connexion = connectToDatabase();

    
    $insertionClient = "INSERT INTO clients (nom, adresse, telephone) VALUES ('$nom', '$adresse', '$telephone')";

    if (mysqli_query($connexion, $insertionClient)) {
        return mysqli_insert_id($connexion);
    } else {
        return false;
    }
}

function insertIntervention($client_id, $date_demande, $date_intervention, $num_demande, $intervention_demandee, $num_chantier) {
    $connexion = connectToDatabase();
    
    $insertionIntervention = "INSERT INTO interventions (client_id, date_demande, date_intervention, num_demande, intervention_demandee, num_chantier)
                             VALUES ('$client_id', '$date_demande', '$date_intervention', '$num_demande', '$intervention_demandee', '$num_chantier')";

    if (mysqli_query($connexion, $insertionIntervention)) {
        return true;
    } else {
        return false;
    }
}

function insertTechnicien($technicien, $jours, $total_heures, $forfait_deplacement) {
    $connexion = connectToDatabase();
    
    $insertionTechnicien = "INSERT INTO techniciens (nom, jours, total_heures, forfait_deplacement)
                             VALUES ('$technicien', '$jours', '$total_heures', '$forfait_deplacement')";

    if (mysqli_query($connexion, $insertionTechnicien)) {
        return true;
    } else {
        return false;
    }
}

function insertObservations($observations) {
    $connexion = connectToDatabase();
    
    $insertionObservations = "INSERT INTO observations (observation) VALUES ('$observations')";

    if (mysqli_query($connexion, $insertionObservations)) {
        return true;
    } else {
        return false;
    }
}

function insertTravaux($client_id, $description_travaux, $ref_articles, $quantite, $prix_unitaire) {
    $connexion = connectToDatabase();
    
    $insertionTravaux = "INSERT INTO travaux ( description, ref_articles, quantite, prix_unitaire)
                         VALUES ( '$description_travaux', '$ref_articles', '$quantite', '$prix_unitaire')";

    if (mysqli_query($connexion, $insertionTravaux)) {
        return true;
    } else {
        return false;
    }
}

function insertSignatures($signature_client, $signature_technicien) {
    $connexion = connectToDatabase();
    
    $insertionSignatures = "INSERT INTO signatures (signature_client, signature_technicien)
                            VALUES ('$signature_client', '$signature_technicien')";

    if (mysqli_query($connexion, $insertionSignatures)) {
        return true;
    } else {
        return false;
    }
}

// Ajoutez d'autres fonctions pour les autres tables
?>
