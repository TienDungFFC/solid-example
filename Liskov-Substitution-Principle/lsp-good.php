<?php 

interface FileInterface {
    public function read();
}

class WriableFile implements FileInterface {
    public function read() {
        // read the file
    }

    public function write() {
        // write the file
    }
}

class ReadOnlyFile implements FileInterface {
    public function read() {

    }
}

function processFile(FileInterface $file) {
    $file->read();
}

$wriableFile = new WriableFile();
$readOnlyFile = new ReadOnlyFile();
processFile($wriableFile);
processFile($readOnlyFile);
