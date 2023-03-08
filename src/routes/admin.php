<?php

use Tina4\Response;
use function Tina4\renderTemplate;

\Tina4\Get::add("/catalog/dashboard", function (Response $response) {

    $twigNameSpace = (new Catalog())->getTwigNameSpace();

        return $response(renderTemplate("/catalog/dashboard.twig", ["twigNameSpace" => $twigNameSpace]));
});
