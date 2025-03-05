<?php
spl_autoload_register(function ($className) {
    $directories = [
        __DIR__ . "/Controllers/",
        __DIR__ . "/Models/",
        __DIR__ . "/Views/",
    ];

    foreach ($directories as $directory) {
        $file = $directory . $className . ".php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
?>