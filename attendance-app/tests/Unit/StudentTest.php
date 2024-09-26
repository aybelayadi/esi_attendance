<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_add_a_student()
    {
        $student = Student::create(['number' => 1, 'first_name' => 'SpongeBob', 'last_name' => 'SquarePants']);
        $this->assertDatabaseHas('students', ['number' => 1, 'first_name' => 'SpongeBob', 'last_name' => 'SquarePants']);
    }

    /** @test */
    public function it_throws_exception_when_number_is_negative()
    {
        $this->expectException(\Exception::class);
        Student::create(['number' => -1, 'first_name' => 'SpongeBob', 'last_name' => 'SquarePants']);
    }

    /** @test */
    public function it_throws_exception_when_number_already_exists()
    {
        Student::create(['number' => 1, 'first_name' => 'SpongeBob', 'last_name' => 'SquarePants']);
        
        $this->expectException(\Exception::class);
        Student::create(['number' => 1, 'first_name' => 'SpongeBob', 'last_name' => 'SquarePants']);
    }
}
