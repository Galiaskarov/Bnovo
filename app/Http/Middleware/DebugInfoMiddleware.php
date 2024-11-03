<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DebugInfoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Запоминаем время начала выполнения запроса
        $startTime = microtime(true);

        // Выполняем запрос
        $response = $next($request);

        // Рассчитываем время выполнения
        $executionTime = (microtime(true) - $startTime) * 1000; // Время в миллисекундах
        $memoryUsage = memory_get_usage(true) / 1024; // Память в Кб

        // Добавляем заголовки к ответу
        $response->headers->set('X-Debug-Time', round($executionTime, 2));
        $response->headers->set('X-Debug-Memory', round($memoryUsage, 2));

        return $response;

    }
}
