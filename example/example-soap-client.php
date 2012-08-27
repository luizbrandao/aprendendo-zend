<?php

// load Zend libraries
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Soap_Client');

// initialize SOAP client
$options = array(
    'location' => 'http://localhost:81/example/index/soap',
    'uri' => 'http://localhost:81/example/index/soap',
);

try {
    // add a new product
    // get and display product ID
    $p = array(
        'title' => 'Spinning Top',
        'shortdesc' => 'Hours of fun await with this colorful spinning top. 
      Includes flashing colored lights.',
        'price' => '3.99',
        'quantity' => 57
    );
    $client = new Zend_Soap_Client(null, $options);
    $id = $client->addProduct($p);
    echo 'Added product with ID: ' . $result;

    // update existing product
    $p = array(
        'title' => 'Box-With-Me Croc',
        'shortdesc' => 'Have fun boxing with this inflatable crocodile, 
      made of tough, washable rubber.',
        'price' => '12.99',
        'quantity' => 25
    );
    $client->updateProduct($id, $p);
    echo 'Updated product with ID: ' . $id;

    // delete existing product
    $client->deleteProduct($id);
    echo 'Deleted product with ID: ' . $id;
} catch (SoapFault $s) {
    die('ERROR: [' . $s->faultcode . '] ' . $s->faultstring);
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
?>
