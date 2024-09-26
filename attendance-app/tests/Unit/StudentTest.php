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
        $student = Student::create(['name' => 'SpongeBob SquarePants', 'matriculation_number' => '1']);
        $this->assertDatabaseHas('students', ['matriculation_number' => '1', 'name' => 'SpongeBob SquarePants']);
    }

    /** @test */
    public function it_throws_exception_when_number_is_negative()
    {
     $this->expectException(\Exception::class);
     Student::create(['number' => -1, 'first_name' => 'SpongeBob', 'last_name' => 'SquarePants']);
    }


    /** @test */
    public function it_throws_exception_when_matriculation_number_already_exists()
    {
        Student::create(['name' => 'SpongeBob SquarePants', 'matriculation_number' => '1']);

        $this->expectException(\Illuminate\Database\QueryException::class);
        Student::create(['name' => 'Another Student', 'matriculation_number' => '1']);
    }
}
