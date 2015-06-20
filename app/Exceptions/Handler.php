<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Services\SystemCode;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Exceptions\AppException;
use Illuminate\Contracts\Logging\Log;

class Handler extends ExceptionHandler {
	
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = array (
			'Symfony\Component\HttpKernel\Exception\HttpException' 
	);
	
	/**
	 * Report or log an exception.
	 *
	 * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
	 *
	 * @param \Exception $e        	
	 * @return void
	 */
	public function report(Exception $e) {
		return parent::report ( $e );
	}
	
	/**
	 * App Handler Exception.
	 *
	 * @param \Illuminate\Http\Request $request        	
	 * @param \Exception $e        	
	 * @return \Illuminate\Http\Response
	 */
	public function render($request,\Exception $e) {
		$code = SystemCode::UNHANDLED_ERROR;
		$message = $e->getMessage ();

		if ($e instanceof AppException) {
			return response ()->json ( buildResponseMessage ( $message, $e->getCode () ) );
		} elseif ($e instanceof NotFoundHttpException) {
			$code = SystemCode::NOT_FOUND;
		} elseif ($e instanceof \PDOException) {
			$code = SystemCode::DB_ERROR;
			$message = trans ( 'common.database_error' );
		}
		
		if ($request->ajax ()) {
			return response ()->json ( buildResponseMessage ( $message, $code ) );
		} else {
			if (view ()->exists ( 'errors.' . $code ))
				return redirect ( 'server-error/' . $code );
			else
				return redirect ( 'server-error/' . SystemCode::UNHANDLED_ERROR );
		}
	}
}
