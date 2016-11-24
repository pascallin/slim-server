<?php

$app->get('/hello/{name}', function ($request, $response) {
    $name = $request->getAttribute('name');
    //$response->getBody()->write("Hello, $name");
	$response = $this->view->render($response, "test.phtml", ["name" => $name]);
    return $response;
});

$app->get('/log', function ($request, $response) {
    $this->logger->addInfo("Something interesting happened");
	$response->getBody()->write("okay");
    return $response;
});

$app->get('/test',function ($request, $response){
    $result = $this->db->get("account", "email", [
        "user_id" => 1234
    ]);
    $response->getBody()->write($result);
    return $response;
});