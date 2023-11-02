<?php

namespace App\Controllers;

abstract class ControllerBase
{
    public function view(string $path, array $variaveis = null): string
    {
        ob_start();
        if ($variaveis !== null) {
            extract($variaveis);
        }
        include __DIR__ . '/../../views/' . $path;
        $viewContent = ob_get_clean();

        return $viewContent;
    }

    public function viewMessage(string $type, string $message)
    {
        $_SESSION["custom_message"] = [
            "type" => $type,
            "message" => $message
        ];
    }
}
