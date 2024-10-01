<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Student;

class StudentListTest extends DuskTestCase
{
    /**
     * Test pour vérifier que la liste des étudiants est triée par matricule.
     *
     * @return void
     */
    public function testStudentsAreSortedByMatriculationNumber()
    {
        $this->browse(function (Browser $browser) {
            // Visiter la page de la liste des étudiants
            $browser->visit('/students');
                    //->assertSee('Liste des étudiants');

            // Récupérer les matricules des étudiants affichés
            $matricules = $browser->elements('.student-matriculation'); 
            $matriculeNumbers = [];

            foreach ($matricules as $matricule) {
                $matriculeNumbers[] = $matricule->getText();  
            }

            
            $sortedMatricules = $matriculeNumbers;
            sort($sortedMatricules);  
            $this->assertEquals($sortedMatricules, $matriculeNumbers);  
        });
    }
}