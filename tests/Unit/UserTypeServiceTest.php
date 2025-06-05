<?php

namespace Tests\Unit;

use App\Models\UserType;
use App\Services\UserTypeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTypeServiceTest extends TestCase
{
    use RefreshDatabase;

    private UserTypeService $userTypeService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userTypeService = new UserTypeService();
    }

    public function test_create_user_type()
    {
        $data = [
            'type' => 'programmer',
        ];

        $userType = $this->userTypeService->create($data);

        $this->assertInstanceOf(UserType::class, $userType);
        $this->assertEquals($data['type'], $userType->type);
    }

    public function test_update_user_type()
    {
        $userType = UserType::factory()->create();
        $updateData = [
            'type' => 'designer',
        ];

        $updatedUserType = $this->userTypeService->update($updateData, $userType);

        $this->assertInstanceOf(UserType::class, $updatedUserType);
        $this->assertEquals($updateData['type'], $updatedUserType->type);
    }

    public function test_delete_user_type()
    {
        $userType = UserType::factory()->create();

        $result = $this->userTypeService->delete($userType);

        $this->assertTrue($result);
        $this->assertDatabaseMissing('user_types', ['id' => $userType->id]);
    }
}