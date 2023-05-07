
<?php
$prenom = "yoyo";
$nom = "mayou";
$note1 = 10;
$note2 = 20;
$moyenne = ($note1 + $note2) / 2;
echo "Bonjour $prenom $nom vous avez eu " . (($note1 + $note2) / 2) . " de moyenne \n";
echo "Bonjour $prenom $nom vous avez eu $moyenne de moyenne";
?>

<?php
$notes = [10, 20];
echo $notes[1];
?>

<?php
$eleve = [$prenom, $nom, $moyenne, $notes];
echo $eleve[2];
print_r($eleve);
?>

<?php
$classe = [
    "nom" => "CM2",
    "nombre" => 6,
    "eleves" => [
        ["nom" => "Toto", "notes" => [10, 15, 8]],
        ["nom" => "Titi", "notes" => [12, 14, 18]],
        ["nom" => "Tata", "notes" => [8, 9, 12]],
        ["nom" => "Tutu", "notes" => [9, 19, 20]],
        ["nom" => "Tyty", "notes" => [10, 15, 8]],
        ["nom" => "Tata", "notes" => [9, 17, 15]],
    ]
];
echo $classe["eleves"][1]["notes"][2];
print_r($classe);
?>

<?php
$note = (int)readline("Entrez votre note : ");
if ($note < 10) {
    echo "Vous avez eu $note, c'est pas terrible";
} elseif ($note > 10) {
    echo "Vous avez eu $note, c'est pas mal";
} elseif ($note === 10) {
    echo "Vous avez eu $note, pile poil la moyenne !";
}
?>

