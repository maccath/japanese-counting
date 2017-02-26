<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    // Render index view
    return $this->renderer->render($response, 'pages/index.twig', [
        'numeral' => new \App\Numeral(random_int(0, 500)),
        'kanjiConversion' => new \App\Conversions\KanjiConversionService(),
        'kanjiPriceConversion' => new \App\Conversions\KanjiPriceConversionService(),
    ]);
});
