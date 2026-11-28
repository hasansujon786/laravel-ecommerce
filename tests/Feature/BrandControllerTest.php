<?php

namespace Tests\Feature;

use App\Models\Brand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BrandControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_renders_all_brands(): void
    {
        $brands = Brand::factory()->count(2)->create();

        $response = $this->get(route('brands.index'));

        $response->assertOk()
            ->assertSee($brands[0]->name)
            ->assertSee($brands[1]->name);
    }

    public function test_index_escapes_brand_names(): void
    {
        Brand::factory()->create(['name' => '<script>alert(1)</script>']);

        $response = $this->get(route('brands.index'));

        $response->assertOk()
            ->assertDontSee('<script>', false)
            ->assertSee('&lt;script&gt;', false);
    }

    public function test_index_filters_brands_by_name(): void
    {
        Brand::factory()->create(['name' => 'Acme Supply', 'slug' => 'acme-supply']);
        Brand::factory()->create(['name' => 'Globex Supply', 'slug' => 'globex-supply']);

        $response = $this->get(route('brands.index', ['search' => '  Acme  ']));

        $response->assertOk()
            ->assertSee('Acme Supply')
            ->assertDontSee('Globex Supply');
    }

    public function test_index_filters_brands_by_slug(): void
    {
        Brand::factory()->create(['name' => 'Acme Supply', 'slug' => 'acme-supply']);
        Brand::factory()->create(['name' => 'Globex Supply', 'slug' => 'globex-supply']);

        $response = $this->get(route('brands.index', ['search' => 'globex']));

        $response->assertOk()
            ->assertSee('Globex Supply')
            ->assertDontSee('Acme Supply');
    }

    public function test_index_renders_search_input_with_current_search_term(): void
    {
        $response = $this->get(route('brands.index', ['search' => 'Acme']));

        $response->assertOk()
            ->assertSee('name="search"', false)
            ->assertSee('value="Acme"', false);
    }

    public function test_index_shows_empty_state_when_search_has_no_matches(): void
    {
        Brand::factory()->create(['name' => 'Acme Supply', 'slug' => 'acme-supply']);

        $response = $this->get(route('brands.index', ['search' => 'missing-brand']));

        $response->assertOk()
            ->assertSee('No brands found.')
            ->assertDontSee('Acme Supply');
    }

    public function test_index_escapes_search_term(): void
    {
        $response = $this->get(route('brands.index', ['search' => '"><script>alert(1)</script>']));

        $response->assertOk()
            ->assertDontSee('<script>', false)
            ->assertSee('&lt;script&gt;', false);
    }

    public function test_index_ignores_invalid_search_input(): void
    {
        Brand::factory()->create(['name' => 'Acme Supply', 'slug' => 'acme-supply']);

        $response = $this->get(route('brands.index', ['search' => ['Acme']]));

        $response->assertOk()->assertSee('Acme Supply');
    }

    public function test_create_renders_brand_form(): void
    {
        $response = $this->get(route('brands.create'));

        $response->assertOk()->assertSee('Create brand');
    }

    public function test_store_creates_brand_and_redirects_to_index(): void
    {
        $payload = [
            'name' => 'Acme',
            'slug' => 'acme',
            'image' => 'https://example.com/acme.png',
        ];

        $response = $this->post(route('brands.store'), $payload);

        $response->assertRedirect(route('brands.index'));
        $this->assertDatabaseHas('brands', $payload);
    }

    public function test_store_rejects_empty_payload(): void
    {
        $response = $this->post(route('brands.store'), []);

        $response->assertSessionHasErrors([
            'name' => 'The name field is required.',
            'slug' => 'The slug field is required.',
            'image' => 'The image field is required.',
        ]);
        $this->assertDatabaseCount('brands', 0);
    }

    public function test_store_rejects_duplicate_slug(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->post(route('brands.store'), [
            'name' => 'Other brand',
            'slug' => $brand->slug,
            'image' => 'https://example.com/other.png',
        ]);

        $response->assertSessionHasErrors(['slug' => 'The slug has already been taken.']);
        $this->assertDatabaseCount('brands', 1);
    }

    public function test_edit_renders_form_with_existing_values(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->get(route('brands.edit', $brand));

        $response->assertOk()
            ->assertSee('Update brand')
            ->assertSee($brand->slug);
    }

    public function test_update_changes_brand_and_redirects_to_index(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->put(route('brands.update', $brand), [
            'name' => 'Renamed brand',
            'slug' => 'renamed-brand',
            'image' => 'https://example.com/renamed.png',
        ]);

        $response->assertRedirect(route('brands.index'));
        $this->assertDatabaseHas('brands', [
            'id' => $brand->id,
            'name' => 'Renamed brand',
            'slug' => 'renamed-brand',
        ]);
    }

    public function test_update_keeps_the_same_slug_on_the_same_brand(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->put(route('brands.update', $brand), [
            'name' => $brand->name,
            'slug' => $brand->slug,
            'image' => $brand->image,
        ]);

        $response->assertSessionHasNoErrors()->assertRedirect(route('brands.index'));
        $this->assertDatabaseHas('brands', [
            'id' => $brand->id,
            'slug' => $brand->slug,
        ]);
    }

    public function test_destroy_deletes_brand_and_redirects_to_index(): void
    {
        $brand = Brand::factory()->create();

        $response = $this->delete(route('brands.destroy', $brand));

        $response->assertRedirect(route('brands.index'));
        $this->assertModelMissing($brand);
    }
}
