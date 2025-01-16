<?php

declare(strict_types=1);

namespace Core;

class Controller
{
    /**
     * Renders a view with the given data.
     *
     * This method uses the View class to render a specified view file,
     * passing an associative array of data to it.
     *
     * @param string $view The name of the view file to render.
     * @param array $data An associative array of data to pass to the view.
     *                     Default is an empty array.
     */
    protected function renderView(string $view, array $data = []): void
    {
        View::render($view, $data);
    }
}
