<?php

declare(strict_types=1);

namespace Core;

class View
{
    /**
     * Renders a view with the given data.
     *
     * This method defines a closure to render a specified view file,
     * passing an associative array of data to it. The closure extracts
     * the data into the current scope and includes the view file.
     *
     * @param string $view The name of the view file to render.
     * @param array $data An associative array of data to pass to the view.
     *                     Default is an empty array.
     */
    public static function render(string $view, array $data = []): void
    {
        // Define a closure to render the view
        $render = static function () use ($data, $view): void {
            // Extract variables into the current scope
            extract($data, EXTR_SKIP);

            // Include the view file
            include self::viewPath($view);
        };

        // Invoke the closure
        $render();
    }


    /**
     * Constructs the file path for a given view.
     *
     * This method generates the file path for a view file based on the view name.
     * The view files are located in the `../src/views/` directory.
     *
     * @param string $view The name of the view file.
     *
     * @return string The full file path to the view file.
     */
    private static function viewPath(string $view): string
    {
        return sprintf('../src/Views/%s.php', $view);
    }
}
