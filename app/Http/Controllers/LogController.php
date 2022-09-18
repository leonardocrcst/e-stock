<?php

namespace App\Http\Controllers;

use App\Http\Responses\BadRequest;
use App\Models\Log;
use DateInterval;
use DateTime;
use stdClass;
use Throwable;

class LogController extends Controller
{
    public function index(string $from = null, string $to = null): string|stdClass
    {
        $user = auth()->user();
        try {
            Log::register($user, "Consultou o log do sistema");
            $_start = $this->getInitialDate($from);
            $_from = $_start->format("Y-m-d");
            $_to = $this->getFinalDate($_start, $to)->format("Y-m-d");
            $log = Log::with("users")
                ->whereBetween("created_at", [$_from, $_to])
                ->orderByDesc("created_at")
                ->get();
            return $log->toJson();
        } catch (Throwable $e) {
            return BadRequest::get($e->getMessage());
        }
    }

    private function getInitialDate(string $date = null): DateTime
    {
        return date_create(!is_null($date) ? $date : "now");
    }

    private function getFinalDate(DateTime $start, string $date = null): DateTime
    {
        return date_create(
            is_null($date)
                ? $start->add(new DateInterval("P1M"))->format("Y-m-d")
                : $date
        );
    }
}
