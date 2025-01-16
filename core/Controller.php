<?php

declare(strict_types=1);

namespace Core;

class Controller
{
    protected function renderView(string $view, array $data = []): void
    {
        View::render($view, $data);
    }
}
