<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AuthTest extends TestCase
{
   use RefreshDatabase;
   
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function testRegister(){
   
    $data = [
        'email' => 'test@gmail.com',
        'name' => 'Test',
        'password' => 'secret1234',
        'password_confirmation' => 'secret1234',
    ];
    
    $response = $this->json('POST',route('api.register'),$data);
    //dd($response);
    //Assert it was successful
    $response->assertStatus(201);
    
    
  }

  public function testLogin()
{
    
    User::create([
        'name' => 'test',
        'email'=>'test@gmail.com',
        'password' => bcrypt('secret1234')
    ]);
    
    $response = $this->json('POST',route('api.authenticate'),[
        'email' => 'test@gmail.com',
        'password' => 'secret1234',
    ]);
    
    $response->assertStatus(200);
    
}
public function testVoiture()
    {
        $user = factory(\App\User::class)->create();
        $response = $this->actingAs($user)->post('api/auth/voiture', [
            'name' => 'Nissan',
            'type' => 'Noir ',
            'description' => 'Tous les détails de ma nouvelle tâche',
            'matricule' => 'SM001T',
        ]);

        $response->assertStatus(200);
        /*$this->assertDatabaseHas('tasks', [
            'title' => 'Ma nouvelle tâche'
        ]);
        $this->get('api/auth/voiture')
             ->assertSee('Ma nouvelle tâche');*/
    }

}
