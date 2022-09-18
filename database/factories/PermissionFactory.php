<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "account_id" => 1,
            "route_id" => 1,
            "select" => true,
            "insert" => true,
            "update" => true,
            "delete" => true
        ];
    }
}
