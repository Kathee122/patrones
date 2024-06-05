<?php

// Interface para los archivos
interface File {
    public function open();
}

// Implementación del archivo Word para Windows 7
class WordFileWindows7 implements File {
    public function open() {
        echo "Abriendo archivo Word en Windows 7.\n";
    }
}

// Implementación del archivo Excel para Windows 7
class ExcelFileWindows7 implements File {
    public function open() {
        echo "Abriendo archivo Excel en Windows 7.\n";
    }
}

// Implementación del archivo PowerPoint para Windows 7
class PowerPointFileWindows7 implements File {
    public function open() {
        echo "Abriendo archivo PowerPoint en Windows 7.\n";
    }
}

// Interface para el sistema operativo
interface Windows10Compatible {
    public function openFile();
}

// Adaptador para hacer que los archivos sean compatibles con Windows 10
class Windows10FileAdapter implements Windows10Compatible {
    private $file;

    public function __construct(File $file) {
        $this->file = $file;
    }

    public function openFile() {
        $this->file->open();
    }
}

// Ejemplo de uso
$wordFile = new WordFileWindows7();
$excelFile = new ExcelFileWindows7();
$powerPointFile = new PowerPointFileWindows7();

$wordAdapter = new Windows10FileAdapter($wordFile);
$excelAdapter = new Windows10FileAdapter($excelFile);
$powerPointAdapter = new Windows10FileAdapter($powerPointFile);

$wordAdapter->openFile();
$excelAdapter->openFile();
$powerPointAdapter->openFile();
?>
