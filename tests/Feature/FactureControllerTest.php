<?php

namespace Tests\Feature;

use App\Models\Facture;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FactureControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_all_factures()
    {
        Facture::factory()->count(3)->create();

        $response = $this->get(route('factures.index'));

        $response->assertStatus(200);
        $response->assertViewHas('factures');
    }

    /** @test */
    public function it_can_show_the_create_facture_form()
    {
        $response = $this->get(route('factures.create'));

        $response->assertStatus(200);
        $response->assertViewIs('factures.create');
    }

    /** @test */
    public function it_can_store_a_facture()
    {
        $data = [
            'numero_facture' => 'FAC123',
            'montant' => 100.50,
        ];

        $response = $this->post(route('factures.store'), $data);

        $this->assertDatabaseHas('factures', $data);
        $response->assertRedirect(route('factures.index'));
    }

    /** @test */
    public function it_can_show_a_facture()
    {
        $facture = Facture::factory()->create();

        $response = $this->get(route('factures.show', $facture->id));

        $response->assertStatus(200);
        $response->assertViewHas('facture');
    }

    /** @test */
    public function it_can_show_the_edit_facture_form()
    {
        $facture = Facture::factory()->create();

        $response = $this->get(route('factures.edit', $facture->id));

        $response->assertStatus(200);
        $response->assertViewHas('facture');
    }

    /** @test */
    public function it_can_update_a_facture()
    {
        $facture = Facture::factory()->create();

        $data = [
            'numero_facture' => 'FAC123',
            'montant' => 150.75,
        ];

        $response = $this->put(route('factures.update', $facture->id), $data);

        $this->assertDatabaseHas('factures', $data);
        $response->assertRedirect(route('factures.index'));
    }

    /** @test */
    public function it_can_delete_a_facture()
    {
        $facture = Facture::factory()->create();

        $response = $this->delete(route('factures.destroy', $facture->id));

        $this->assertDatabaseMissing('factures', ['id' => $facture->id]);
        $response->assertRedirect(route('factures.index'));
    }

    /** @test */
    public function it_can_perform_rapprochement_bancaire()
    {
        // Setup for rapprochement bancaire test
        // Import test data and setup clients and factures as needed

        // Example logic here, adjust based on your actual implementation
        $response = $this->get(route('factures.rapprochement'));

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Succès! Toutes les factures correspondent aux montants versés.',
        ]);
    }
}
