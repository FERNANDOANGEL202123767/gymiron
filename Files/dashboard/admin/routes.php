<?php
require 'vendor/autoload.php';

use Webauthn\PublicKeyCredentialCreationOptions;
use Webauthn\PublicKeyCredentialRpEntity;
use Webauthn\PublicKeyCredentialUserEntity;
use Webauthn\AuthenticatorSelectionCriteria;
use Webauthn\PublicKeyCredentialParameters;
use Webauthn\PublicKeyCredentialDescriptor;
use Webauthn\PublicKeyCredentialRequestOptions;
use Webauthn\Server;

$server = new Server(
    new PublicKeyCredentialRpEntity('GymIron', 'localhost'),
    new Psr\Http\Message\ServerRequestFactory(), // Replace with your actual implementation
    new Psr\Http\Message\ResponseFactory(), // Replace with your actual implementation
    new Psr\Http\Message\StreamFactory() // Replace with your actual implementation
);

session_start();

$action = $_POST['action'] ?? '';

switch ($action) {
    case 'start_registration':
        $userEntity = new PublicKeyCredentialUserEntity(
            $_POST['username'],
            $_POST['userId'],
            $_POST['username']
        );

        $publicKeyCredentialCreationOptions = $server->generatePublicKeyCredentialCreationOptions(
            $userEntity,
            PublicKeyCredentialCreationOptions::ATTESTATION_CONVEYANCE_PREFERENCE_DIRECT,
            [new PublicKeyCredentialParameters(PublicKeyCredentialDescriptor::CREDENTIAL_TYPE_PUBLIC_KEY, -7)]
        );

        $_SESSION['publicKeyCredentialCreationOptions'] = $publicKeyCredentialCreationOptions;

        echo json_encode($publicKeyCredentialCreationOptions);
        break;

    case 'finish_registration':
        $publicKeyCredentialCreationOptions = $_SESSION['publicKeyCredentialCreationOptions'];

        $publicKeyCredential = json_decode(file_get_contents('php://input'), true);

        $server->loadAndCheckAttestationResponse(
            $publicKeyCredential,
            $publicKeyCredentialCreationOptions,
            $_POST['userId']
        );

        // Save the credential in the database

        echo json_encode(['status' => 'ok']);
        break;

    case 'start_authentication':
        $publicKeyCredentialRequestOptions = $server->generatePublicKeyCredentialRequestOptions();

        $_SESSION['publicKeyCredentialRequestOptions'] = $publicKeyCredentialRequestOptions;

        echo json_encode($publicKeyCredentialRequestOptions);
        break;

    case 'finish_authentication':
        $publicKeyCredentialRequestOptions = $_SESSION['publicKeyCredentialRequestOptions'];

        $publicKeyCredential = json_decode(file_get_contents('php://input'), true);

        $server->loadAndCheckAssertionResponse(
            $publicKeyCredential,
            $publicKeyCredentialRequestOptions,
            function ($userHandle) {
                // Retrieve the user from the database using the user handle
            }
        );

        echo json_encode(['status' => 'ok']);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}
?>
