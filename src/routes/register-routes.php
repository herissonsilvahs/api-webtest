<?php

$app->post('/api/v1/motorist/new[/]', function($request, $response, $args){
    $motorist = new Motorist();
    $user = new User();

    $user->name = $values['name_user'];
    $date = new DateTime($values['birthday_user']);
    $user->birthday = $date->format('Y-m-d');
    $user->cpf = $values['cpf_user'];
    $user->gender = $values['gender_user'];
    if($user->save())
    {
        $motorist->user_id = $user->id;
        $motorist->status = 1;
        $motorist->car_model = $values['car_model'];
        if($motorist->save())
            return $response->withJson("Saved success",200);
        else
            return $response->withJson("Occurred error to insert motorist",400);

    }else
        return $response->withJson("Occurred error to insert user",400);

    return $response->withJson("Occurred some error",400);
});

$app->post('/api/v1/passenger/new[/]', function($request, $response, $args){
    $passenger = new Passenger();
    $user = new User();
    $values = $request->getParsedBody();

    $user->name = $values['name_user'];
    $date = new DateTime($values['birthday_user']);
    $user->birthday = $date->format('Y-m-d');
    $user->cpf = $values['cpf_user'];
    $user->gender = $values['gender_user'];
    if($user->save())
    {
        $passenger->user_id = $user->id;
        if($passenger->save())
            return $response->withJson(200);
        else
            return $response->withJson("Occurred error to insert passenger",400);
    }else
        return $response->withJson("Occurred error to insert user",400);

    return $response->withJson("Occurred some error",400);
});

$app->post('/api/v1/race/new[/]', function($request, $response, $args){
    $race = new Race();
    $values = $request->getParsedBody();

    $race->price = $values['race_price'];
    $race->passenger_id = $values['passenger'];
    $race->motorist = $values['motorist'];
    if($race->save())
        return $response->withJson(200);
    else
        return $response->withJson("Occurred error to insert race",400);

    return $response->withJson("Occurred some error",400);
});
