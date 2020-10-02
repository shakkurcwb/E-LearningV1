<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Redirect a response.
     * 
     * @param String $uri
     * @return Illuminate\Http\RedirectResponse
     */
    public function redirect(string $uri): \Illuminate\Http\RedirectResponse
    {
        return redirect($uri);
    }

    /**
     * View response + data.
     * 
     * @param String $slug
     * @param Array $data
     * @return Illuminate\Http\Response
     */
    public function view(String $slug = "", Array $data = []): \Illuminate\Http\Response
    {
        return response()->view($slug, $data);
    }

    /**
     * Json Response.
     * 
     * @param Array $data
     * @param Int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function json(Array $data = [], Int $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json($data, $status);
    }
}
