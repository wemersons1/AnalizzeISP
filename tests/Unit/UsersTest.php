<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Enums\RoleEnum;
use App\Enums\UserStatusesEnum;
use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_create_user_with_midleware(): void
    {
        $data = [
            'name' => "User 1",
            'email' => "email@test.com",
            'cpf '=> '12345678910',
            'birth_date' => '2000-11-01',
            'phone2' => '62995690496',
            'phone1' => '62995690496',
            'accession_date' => '2000-11-01',
            'description' => 'descrição 1',
            'registered_by' => null,
            'status_id' => UserStatusesEnum::NOVO->value,
            'role_id' => RoleEnum::MASTER->value,
            'company_id' => null
        ];

        $response = $this->withHeaders(["accept" => 'application/json'])->post('/api/v1/users',$data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }

}
