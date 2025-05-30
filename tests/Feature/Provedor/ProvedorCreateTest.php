<?php

namespace Tests\Feature\Provedor;
use App\Models\Provedor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User; 

/**
 * @group provedor
 * @group provedorCreate
 */

class ProvedorCreateTest extends TestCase
{
    use RefreshDatabase;

/**
 * @test
 */

    public function canCreateProvedor()
    {
        $this->actingAs($user = User::factory()->withPersonalTeam()->create());

        $provedorFake = Provedor::factory()->make();
    }

}
