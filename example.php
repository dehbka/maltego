<?php

use Dehbka\Maltego\AbstractEntity;
use Dehbka\Maltego\AdditionalField;
use Dehbka\Maltego\ResponseFormatter;

require_once __DIR__ . '/vendor/autoload.php';

$formatter = new ResponseFormatter();

$person = new class ('John Doe') extends AbstractEntity {
    public function getType(): string
    {
        return 'maltego.Person';
    }
};
$person->addAdditionalField(new AdditionalField('uuid', uniqid()));

echo $formatter->format([$person]);
