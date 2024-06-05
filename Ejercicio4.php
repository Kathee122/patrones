<?php

// Interfaz de salida
interface OutputStrategy {
    public function output($message);
}

// Clase de salida por consola
class ConsoleOutput implements OutputStrategy {
    public function output($message) {
        echo $message . "\n";
    }
}

// Clase de salida en formato JSON
class JsonOutput implements OutputStrategy {
    public function output($message) {
        echo json_encode(array('message' => $message)) . "\n";
    }
}

// Clase de salida en archivo TXT
class TxtOutput implements OutputStrategy {
    public function output($message) {
        file_put_contents('output.txt', $message . "\n", FILE_APPEND);
    }
}

// Clase que utiliza la estrategia de salida
class MessageDisplayer {
    private $outputStrategy;

    public function __construct(OutputStrategy $outputStrategy) {
        $this->outputStrategy = $outputStrategy;
    }

    public function displayMessage($message) {
        $this->outputStrategy->output($message);
    }
}

// Uso del patrón Strategy
$messageDisplayer = new MessageDisplayer(new ConsoleOutput());
$messageDisplayer->displayMessage('Hola, mundo en consola!');

$messageDisplayer = new MessageDisplayer(new JsonOutput());
$messageDisplayer->displayMessage('Hola, mundo en Json!');

$messageDisplayer = new MessageDisplayer(new TxtOutput());
$messageDisplayer->displayMessage('Hola, mundo!');
