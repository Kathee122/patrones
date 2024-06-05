<?php

// Interface para los personajes
interface Character {
    public function attack();
    public function speed();
}

// Implementación del personaje Esqueleto
class Skeleton implements Character {
    public function attack() {
        echo "Esqueleto ataca con una espada.\n";
    }

    public function speed() {
        echo "Esqueleto tiene una velocidad media.\n";
    }
}

// Implementación del personaje Zombi
class Zombie implements Character {
    public function attack() {
        echo "Zombi ataca con sus manos.\n";
    }

    public function speed() {
        echo "Zombi tiene una velocidad lenta.\n";
    }
}

// Fábrica de personajes
class CharacterFactory {
    public static function createCharacter($level) {
        if ($level == 'easy') {
            return new Skeleton();
        } else if ($level == 'hard') {
            return new Zombie();
        } else {
            throw new Exception("Nivel no soportado");
        }
    }
}

// Ejemplo de uso
try {
    $character = CharacterFactory::createCharacter('easy');
    $character->attack();
    $character->speed();

    $character = CharacterFactory::createCharacter('hard');
    $character->attack();
    $character->speed();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
