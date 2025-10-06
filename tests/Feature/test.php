<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Persona;

class test extends TestCase
{
    use DatabaseTransactions;

    public function test_CrearUsuario(): void
    {
        $data = [
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'telefono' => '123',
        ];

        $response = $this->postJson('/api/personas', $data);
        $response->assertStatus(201);
    }
}
