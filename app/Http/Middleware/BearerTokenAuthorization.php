<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BearerTokenAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$this->isValidToken($token)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }

    private function isValidToken($token)
    {
        $token = str_replace('Bearer ', '', $token);
        if (empty($token)) {
            return false;
        }

        return $this->isValidParentheses($token);
    }

    private function isValidParentheses($input)
    {
        $stack = [];
        $openingBrackets = ['(', '[', '{'];
        $closingBrackets = [')', ']', '}'];

        foreach (str_split($input) as $char)
        {
            if (in_array($char, $openingBrackets)) {
                array_push($stack, $char);
            } elseif (in_array($char, $closingBrackets)) {
                if (empty($stack) || array_search(array_pop($stack), $openingBrackets) != array_search($char, $closingBrackets)) {
                    return false;
                }
            }
        }

        // La cadena es valida si la pila esta vacia
        return empty($stack);
    }

}
