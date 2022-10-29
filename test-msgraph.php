<?php

require_once __DIR__ . '/vendor/autoload.php';

// Include the Microsoft Graph classes
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

// THIS INFORMATION YOU GET AFTER REGISTRATION OF A NEW AZURE APPLICATION
$tenantId="YOUR TENTANT ID FROM YOUR MS TENANT";
$clientId="YOUR CLIENT ID FROM YOUR APPLICATION";
$clientSecret="YOUR CLIENT SECRET FROM YOUR APPLICATION";

//GET A CONNECTION TO MS 
$guzzle = new \GuzzleHttp\Client();
$url = 'https://login.microsoftonline.com/' . $tenantId . '/oauth2/token?api-version=1.0';
$token = json_decode($guzzle->post($url, [
    'form_params' => [
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'resource' => 'https://graph.microsoft.com/',
        'grant_type' => 'client_credentials',
    ],
])->getBody()->getContents());

$accessToken = $token->access_token;

//Print out your accessTOKEN
echo "AccessToken:".$accessToken."\n\n\n";

// GET A CONNECTION TO MS GRAPH
$graph = new Graph();
$graph->setAccessToken($accessToken);

//MY events:
$events = $graph->createRequest("GET", "/me/events",)
              ->addHeaders(['Prefer'        => 'outlook.timezone="Europe/Berlin"']) //Here you can insert the Timezone for Events
			  ->setReturnType(Model\Event::class)
              ->execute();


//Events of other users
/*
$events = $graph->createRequest("GET", "/users/Email Address of the user/events",)
              ->addHeaders(['Prefer'        => 'outlook.timezone="Europe/Berlin"']) //Here you can insert the Timezone for Events
			  ->setReturnType(Model\Event::class)
              ->execute();
*/

print_r($events);


foreach ($events as $item) {
						
						$id = $item->getId();
						$start = ($item->getStart()->getDateTime());
						$end = ($item->getend()->getdatetime());
						$author = $item->getOrganizer()->getEmailaddress()->getname();
						$subject = $item->getSubject();
						
						echo $subject."\n";
						echo $author."\n";					
						echo $start."-->".$end;
}    

?>
