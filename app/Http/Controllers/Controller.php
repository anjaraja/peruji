<?php

namespace App\Http\Controllers;

/**
 * @OA\SecurityScheme(
 *   securityScheme="bearerAuth",
 *   type="http",
 *   scheme="bearer",
 *   bearerFormat="JWT"
 * ),
 * @OA\Info(
 *     title="Peruji API Documentation",
 *     version="0.1",
 *      @OA\Contact(
 *          email="anjarpratama16@gmail.com"
 *      )
 * )
 */
abstract class Controller
{
	//
}
