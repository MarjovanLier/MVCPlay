<?php
namespace Core;

class View {
    public static function render(string $view, array $data = []): void
    {
        // Define a closure to render the view
        $render = static function () use ($data, $view) {
            // Extract variables into the current scope
            extract($data, EXTR_SKIP);
            // Include the view file
            require self::viewPath($view);
        };

        // Invoke the closure
        $render();
    }

    private static function viewPath(string $view): string
    {
        return "../src/views/{$view}.php";
    }
}