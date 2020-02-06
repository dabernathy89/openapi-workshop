<?php

namespace Tests\Integration;

use File;
use Mmal\OpenapiValidator\Validator;

trait ValidatesWithOpenApi
{
    protected $openApiValidator;

    protected function initValidator()
    {
        if (! $this->openApiValidator) {
            $spec_path = base_path('public/raffle-api-spec/reference/raffle-api.json');
            $this->openApiValidator = new Validator(json_decode(File::get($spec_path), true));
        }
    }

    protected function assertValidSchema($path, $method, $response)
    {
        $this->initValidator();

        $result = $this->openApiValidator->validateBasedOnRequest(
            $path,
            $method,
            $response->getStatusCode(),
            $response->getData(true)
        );

        $this->assertFalse($result->hasErrors(), $result);
    }
}
