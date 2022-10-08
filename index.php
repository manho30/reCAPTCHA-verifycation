<?php
/**
 * @author manho <manho30@outlook.my>
 * @version 1.0
 * @package index.php
 * @license MIT
 * @IDE PhpStorm
 * @description A backend API for verifying reCAPTCHA v2
 */


$secret = '6LfJJWQiAAAAAKvIcNfpjUlTZEShPmtPIWizRoUi';

// CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');


// CORS preflight
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    // return the headers
    header('Access-Control-Allow-Origin: *');
    exit;
}
if (empty($_GET['token'])) {
    echo json_encode(
        array(
            'success' => false,
            'error-codes' => array('Token is empty')
        )
    );
    die();
}

echo file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_GET['token']);