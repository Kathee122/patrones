<?php
// Interface para los personajes
interface GameCharacter {
    public function getDescription();
    public function getAttack();
}

// Implementación básica del personaje Guerrero
class Warrior implements GameCharacter {
    public function getDescription() {
        return "Guerrero";
    }

    public function getAttack() {
        return 10;
    }
}

// Implementación básica del personaje Mago
class Mage implements GameCharacter {
    public function getDescription() {
        return "Mago";
    }

    public function getAttack() {
        return 8;
    }
}

// Decorador abstracto
abstract class CharacterDecorator implements GameCharacter {
    protected $character;

    public function __construct(GameCharacter $character) {
        $this->character = $character;
    }

    abstract public function getDescription();
    abstract public function getAttack();
}

// Implementación del decorador Espada
class SwordDecorator extends CharacterDecorator {
    public function getDescription() {
        return $this->character->getDescription() . " con Espada";
    }

    public function getAttack() {
        return $this->character->getAttack() + 5;
    }
}

// Implementación del decorador Escudo
class ShieldDecorator extends CharacterDecorator {
    public function getDescription() {
        return $this->character->getDescription() . " con Escudo";
    }

    public function getAttack() {
        return $this->character->getAttack() + 2;
    }
}

// Ejemplo de uso
$warrior = new Warrior();
$warriorWithSword = new SwordDecorator($warrior);
$warriorWithSwordAndShield = new ShieldDecorator($warriorWithSword);

echo $warriorWithSwordAndShield->getDescription() . " tiene un ataque de " . $warriorWithSwordAndShield->getAttack() . "\n";

$mage = new Mage();
$mageWithShield = new ShieldDecorator($mage);

echo $mageWithShield->getDescription() . " tiene un ataque de " . $mageWithShield->getAttack() . "\n";
?>
