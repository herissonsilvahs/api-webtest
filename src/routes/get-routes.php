<?php

$app->get('/api/v1/motorists[/]', function($request, $response, $args){
    $motorists = Motorist::all();
    $userMotorists = [];
    foreach($motorists as $key)
    {
        array_push($userMotorists, array(
            'user_data' => $motorists[$key]->belongsTo(User::class, 'user_id', 'id')->first(),
            'motorist_data' => $motorists[$key]
        ));
    }
    return $response->withJson($userMotorists, 200);
});

$app->get('/api/v1/passengers[/]', function($request, $response, $args){
    $passengers = Passenger::all();
    $userPassengers = [];
    foreach($passengers as $key)
    {
        array_push($userPassengers, array(
            'user_data' => $passengers[$key]->belongsTo(User::class, 'user_id', 'id')->first(),
            'passenger_data' => $passengers[$key]
        ));
    }
    return $response->withJson($userPassengers, 200);
});

$app->get('/api/v1/races[/]', function($request, $response, $args){
    $races = Race::all();
    $racesList = [];
    foreach($races as $key => $value)
    {
        $passenger = Passenger::where('id', '=', $value['passenger_id'])->first();
        $userPassenger = $passenger->belongsTo(User::class, 'user_id', 'id')->first();
        $motorist = Motorist::where('id', '=', $value['motorist_id'])->first();
        $userMotorist = $motorist->belongsTo(User::class, 'user_id', 'id')->first();

        array_push($racesList, array(
            'id'=>$value['id'],
            'price' => $value['price'],
            'passenger' => array(
                'id' => $passenger->id,
                'user_id' => $userPassenger->id,
                'name' => $userPassenger->name,
            ),
            'motorist' => array(
                'id' => $motorist->id,
                'user_id' => $userMotorist->id,
                'name' => $userMotorist->name,
                'car_model' => $motorist->car_model,
                'status' => $motorist->status,
            ),
            'created_at' => $value['created_at'],
            'updated_at' => $value['updated_at']
        ));
    }
    return $response->withJson($racesList, 200)->withAddedHeader('Access-Control-Allow-Origin', '*');
});

$app->get('/api/v1/motorist/{id}[/]', function($request, $response, $args){
    $motorist = Motorist::where('id', '=', $args['id'])->first();
    $user = $motorist->belongsTo(User::class, 'user_id', 'id')->first();

    return $response->withJson(array(
        'user_data' => $user,
        'motorist_data' => $motorist
    ), 200);
});

$app->get('/api/v1/passenger/{id}[/]', function($request, $response, $args){
    $passenger = Passenger::where('id', '=', $args['id'])->first();
    $user = $passenger->belongsTo(User::class, 'user_id', 'id')->first();

    return $response->withJson(array(
        'user_data' => $user,
        'passenger_data' => $passenger
    ), 200);
});
