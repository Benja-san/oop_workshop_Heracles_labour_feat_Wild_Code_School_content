<?php
//Require all classes I need
require_once "src/Fighter.php";
// First Labour : Heracles vs Nemean Lion
// use your Fighter class here
$heracles = new Fighter("Heracles", 6, 20);
$LionOfNemee = new Fighter("Lion de Nemée", 13, 11);
$roundNumber = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heracles Labour</title>
</head>
<body>
    <main>
        <h1>Heracles Labour Part 1</h1>
        <section>
            <div>
                <h2><?= $heracles->getName() ?></h2>
                <p>Strength : <?= $heracles->getStrength() ?></p>
                <p>Dexterity : <?= $heracles->getDexterity() ?></p>
                <p>Life points : <?= $heracles->getLife() ?></p>
            </div>

            <div>
                <h2><?= $LionOfNemee->getName() ?></h2>
                <p>Strength : <?= $LionOfNemee->getStrength() ?></p>
                <p>Dexterity : <?= $LionOfNemee->getDexterity() ?></p>
                <p>Life points : <?= $LionOfNemee->getLife() ?></p>
            </div>
        </section>
        <section>
            <h2>Fight mode :</h2>
            <?php while($heracles->getLife() > 0 && $LionOfNemee->getLife() > 0 ) : ?>
                <h3>Round number : <?= $roundNumber ?></h3>
                <p>
                    <?= $heracles->getName() ?> 
                    Attacks 
                    <?= $LionOfNemee->getName() ?> 
                    and inflicts 
                    <?= $heracles->fight($LionOfNemee) ?>  
                    of damage
                </p>

                <?php if($LionOfNemee->getLife() > 0) : ?>
                    <p>
                        <?= $LionOfNemee->getName() ?> 
                        Attacks 
                        <?= $heracles->getName() ?> 
                        and inflicts 
                        <?= $LionOfNemee->fight($heracles) ?>  
                        of damage
                    </p>
                <?php endif ?>

                <p>
                    <?= $LionOfNemee->getName() ?> has now <?= $LionOfNemee->getLife() ?> Life points.
                </p>
                <p>
                    <?= $heracles->getName() ?> has now <?= $heracles->getLife() ?> Life points.
                </p>
                <?php $roundNumber++ ?>
            <?php endwhile ?>
        </section>
        <section>
            <h3>
                <?php if ($heracles->getLife() === 0) : ?>
                    <?php if($LionOfNemee->getLife() === 0) : ?>
                        "Draw"
                    <?php endif ?>
                    <?= $LionOfNemee->getName() . "Won the fight!" ?>
                <?php else : ?>
                    <?= $heracles->getName() . "Won the fight!" ?>
                <?php endif ?>
            </h3>
        </section>
    </main>
</body>
</html>