<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_student()
    {
        $response = $this->postJson(route('students.store'), [
            'matriculation_number' => '123456',
            'name' => 'SpongeBob SquarePants',
        ]);
        
        $response->assertStatus(201);

        $this->assertDatabaseHas('students', ['matriculation_number' => '123456']);
    }

    /** @test */
    public function it_can_get_all_students()
    {
        Student::factory()->create(['matriculation_number' => '123456', 'name' => 'Student A']);
        Student::factory()->create(['matriculation_number' => '789012', 'name' => 'Student B']);
        
        $response = $this->get(route('students.index'));

        $response->assertStatus(200);

        $response->assertViewHas('students', function ($students) {
            return $students->count() === 2;
        });
    }

    /** @test */
    public function it_can_get_a_student_by_id()
    {
        $student = Student::factory()->create(['matriculation_number' => '123456', 'name' => 'Student A']);
        
        $response = $this->get(route('students.index') . '/' . $student->id);

        $response->assertStatus(200);

    }

    /** @test */
    public function it_can_update_a_student()
    {
        $student = Student::factory()->create(['matriculation_number' => '123456', 'name' => 'Student A']);
        
        $response = $this->putJson(route('students.index') . '/' . $student->id, [
            'matriculation_number' => '654321',
            'name' => 'Updated Student',
        ]);

        $response->assertStatus(201);
        
        $this->assertDatabaseHas('students', ['matriculation_number' => '654321', 'name' => 'Updated Student']);
    }

    /** @test */
    public function it_can_delete_a_student()
    {
        $student = Student::factory()->create(['matriculation_number' => '123456', 'name' => 'Student A']);
        
        $response = $this->delete(route('students.destroy', $student->id));

        $response->assertStatus(204);
        
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
