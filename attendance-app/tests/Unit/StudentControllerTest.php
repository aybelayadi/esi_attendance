<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function it_can_create_a_student()
    {
        $response = $this->postJson('/api/students', [
            'matriculation_number' => 1,
            'first_name' => 'SpongeBob',
            'last_name' => 'SquarePants',
        ]);
        

        $response->assertStatus(201);
        $this->assertDatabaseHas('students', ['matriculation_number' => 1]);
    }

    /** @test */
    public function it_can_get_all_students()
    {
        Student::factory()->create(['number' => 1]);
        $response = $this->getJson('/api/students');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_a_student_by_id()
    {
        $student = Student::factory()->create(['number' => 1]);
        $response = $this->getJson("/api/students/{$student->id}");

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_update_a_student()
    {
        $student = Student::factory()->create(['number' => 1]);
        $response = $this->putJson("/api/students/{$student->id}", [
            'number' => 2,
            'first_name' => 'Patrick',
            'last_name' => 'Star',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('students', ['number' => 2]);
    }

    /** @test */
    public function it_can_delete_a_student()
    {
        $student = Student::factory()->create(['number' => 1]);
        $response = $this->deleteJson("/api/students/{$student->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
