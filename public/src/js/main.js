
var api_url = 'http://localhost/API-WebTest/public/api/v1/';

function generateRaceListItem(race_id, price, motorist_name, passenger_name)
{
    $('<li></li>', {
        id: 'item',
        class: 'list-group-item',
    }).appendTo('#list-items');

    $('<div>', {
        id: 'race-body',
        class: 'row',
    }).appendTo('#item');

    $('<div>', {
        id: 'race-info',
        class: 'col col-10',
    }).appendTo('#race-body');

    $('<div>', {
        id: 'race-actions',
        class: 'col col-2',
    }).appendTo('#race-body');

    $('<h4>Corrida '+race_id+'</h4>').appendTo('#race-info');
}

function getRaceList()
{
    $.ajax({
        url : api_url + "races/",
        type : 'get',
    }).done(function (retorno) {
        retorno.forEach(function(element){
            generateRaceListItem(
                element['id'], 
                element['price'], 
                element['motorist']['name'], 
                element['passenger']['name']
            );
        });
    });
}

$(document).ready(function(){
    getRaceList();
});