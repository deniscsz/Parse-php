<?php
require 'autoload.php';
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseClient;
$app_id='4BAWEKUqDRBWW5U7wwuBMESh9oW5WAKSXoM4fCqv';
$rest_key='VMpEnro5S2eb7ynIcUanyhP4dc0uJ1vo8C1r3QXv';
$master_key='pNRaIb684kPh9VetJagjgPfE0kkdzxhbhqbUI77X';
ParseClient::initialize( $app_id, $rest_key, $master_key );
// Users of Parse Server will need to point ParseClient at their remote URL and Mount Point:
ParseClient::setServerURL('https://parseapi.back4app.com','/');
//ParseClient::setHttpClient(new ParseStreamHttpClient());
ParseClient::setCAFile(__DIR__ . '/certs/cacert.pem');
$object = ParseObject::create("TestObject");
$objectId = $object->getObjectId();
$php = $object->get("elephant");

// Set values:
$object->set("elephant", "php");
$object->set("today", new DateTime());
$object->setArray("mylist", [1, 2, 3]);
$object->setAssociativeArray(
    "languageTypes", array("php" => "awesome", "ruby" => "wtf")
);

// Save normally:
$object->save();

// Or pass true to use the master key to override ACLs when saving:
$object->save(true);
 ?>
