<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use League\OpenAPIValidation\PSR7\Exception\Validation\InvalidBody;
use League\OpenAPIValidation\Schema\Exception\KeywordMismatch;
use League\OpenAPIValidation\Schema\Exception\TypeMismatch;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \League\OpenAPIValidation\PSR7\Exception\ValidationFailed) {
            if ($exception instanceof InvalidBody) {
                $message = $exception->getPrevious()->getMessage();
            }

            if ($exception->getPrevious() instanceof KeywordMismatch
                || $exception->getPrevious() instanceof TypeMismatch
            ) {
                $message .= "\nKeyword: " . $exception->getPrevious()->keyword();
                $data = $exception->getPrevious()->data();
                if (is_array($data)) {
                    $data = json_encode($data);
                }
                $message .= "\nData: " . $data;
            }

            app()->abort(400, $message);
        }

        return parent::render($request, $exception);
    }
}
