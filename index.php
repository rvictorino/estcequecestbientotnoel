<?php

function getMessageWaitingForChristmas() {
    $DECEMBER_TWENTYFIFTH = '1225'; // mmdd format
    
    $now = new DateTime();
    $currentYearChristmas = DateTime::createFromFormat('Ymd', date("Y").$DECEMBER_TWENTYFIFTH);
    
    $nextChristmas = $currentYearChristmas;
    
    if($currentYearChristmas->getTimestamp() < $now->getTimestamp()) {
        $nextChristmas = $currentYearChristmas->addYear(new DateInterval("P1Y"));
    }
    
    $nbDaysUntilChristmas = intval($now->diff($nextChristmas)->format('%a'));
    
    if($nbDaysUntilChristmas > 300) {
        return "Non, c'est à peine passé!";
    }
    if($nbDaysUntilChristmas > 60) {
        return "Euh… c'est dans super longtemps!";
    }
    if($nbDaysUntilChristmas > 30) {
        return "Bon ok, il fait froid. Mais c'est pas encore Noël!";
    }
    if($nbDaysUntilChristmas > 24) {
        return "Plus qu'un mois à tenir!";
    }
    if($nbDaysUntilChristmas > 1) {
        return "Encore $nbDaysUntilChristmas jours, regarde ton calendrier de l'avent?";
    }
    if($nbDaysUntilChristmas == 1) {
        return "DEMAIN!!! Va te coucher!";
    }
    if($nbDaysUntilChristmas == 0) {
        return "OUI, C'EST NOËL!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Découvrez enfin si c'est bientôt Noël</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
  </head>
  <body>
    <h1>
        <?php echo(getMessageWaitingForChristmas()."\n"); ?>
    </h1>
  </body>
</html>