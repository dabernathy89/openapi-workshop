<?php

namespace Tests\Integration;

use Illuminate\Foundation\Testing\TestResponse;
use League\OpenAPIValidation\PSR7\Exception\Validation\InvalidBody;
use League\OpenAPIValidation\PSR7\OperationAddress;
use League\OpenAPIValidation\PSR7\ValidatorBuilder;
use League\OpenAPIValidation\Schema\Exception\KeywordMismatch;
use League\OpenAPIValidation\Schema\Exception\TypeMismatch;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseInterface;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;

trait ValidatesWithOpenApi
{
    protected $validator;

    protected function initValidator()
    {
        if (! $this->validator) {
            $spec_path = base_path('public/raffle-api-spec/reference/raffle-api.json');
            $this->validator = (new ValidatorBuilder)
                ->fromJsonFile($spec_path)
                ->getResponseValidator();
        }
    }

    protected function validateWithOpenApi($path, $method, TestResponse $response)
    {
        $this->initValidator();
        $response = $this->convertResponse($response);

        $operation = new OperationAddress($path, strtolower($method));

        try {
            $this->validator->validate($operation, $response);
            $success = true;
            $message = '';
        } catch (\Exception $e) {
            $success = false;
            $message = $e->getMessage();

            if ($e instanceof InvalidBody) {
                $message = $e->getPrevious()->getMessage();
            }

            if ($e->getPrevious() instanceof KeywordMismatch
                || $e->getPrevious() instanceof TypeMismatch
            ) {
                $message .= "\nKeyword: " . $e->getPrevious()->keyword();
                $message .= "\nData: " . $e->getPrevious()->data();
            }
        }

        return [$success, $message];
    }

    protected function convertResponse(TestResponse $response) : ResponseInterface
    {
        $psr17Factory = new Psr17Factory();
        $psrHttpFactory = new PsrHttpFactory(
            $psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory
        );

        return $psrHttpFactory->createResponse($response->baseResponse);
    }
}
