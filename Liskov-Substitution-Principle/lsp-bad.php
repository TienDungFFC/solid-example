<?php 

class File {
    public function read() {
        // read the file
    }

    public function write() {
        // write the file
    }
}

class FileOnlyRead extends File {
    public function write() {
        throw new Exception('File only read');
    }
}