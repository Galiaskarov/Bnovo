<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\Enums\GuestEnum;
use App\Models\Guest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestTest extends TestCase
{
    use RefreshDatabase;

    public const NO_QUERY_RESULTS = 'No query results for model [App\Models\Guest] 2';

    /**
     * @return void
     */
    public function testIndexGuestNoData(): void
    {
        $response = $this->get('/api/guests');
        $response->assertOk();
        $response->assertJson([]);
    }

    /**
     * @return void
     */
    public function testIndexGuestWithExistingData(): void
    {
        $guests = Guest::factory(10)->create();

        $response = $this->get('/api/guests');
        $response->assertOk();

        $json = $guests->map(function ($guest) {
            return [
                'id' => $guest->id,
                'first_name' => $guest->first_name,
                'last_name' => $guest->last_name,
                'email' => $guest->email,
                'phone' => $guest->phone,
                'country' => $guest->country,
            ];
        })->toArray();

        $response->assertJson($json);
    }

    /**
     * @return void
     */
    public function testShowExistingGuest(): void
    {
        $guest = Guest::factory()->create();
        $response = $this->get('/api/guests/' . $guest->id);
        $response->assertOk();
        $response->assertJson([
            'id' => $guest->id,
            'first_name' => $guest->first_name,
            'last_name' => $guest->last_name,
            'email' => $guest->email,
            'phone' => $guest->phone,
            'country' => $guest->country,
        ]);
    }

    /**
     * @return void
     */
    public function testShowNonExistentGuest(): void
    {
        $response = $this->get('/api/guests/' . 2);
        $response->assertStatus(404);
        $response->assertJson([
            'message' => GuestEnum::NO_GUEST,
            "error" => self::NO_QUERY_RESULTS]);
    }

    /**
     * @return void
     */
    public function testSuccessCreateNewGuest(): void
    {
        // Успешное создание гостя без вычисления страны.
        $guest = Guest::factory()->make();
        $response = $this->post('/api/guests', $guest->toArray());
        $response->assertOk();

        $guest = Guest::where('email', '=', $guest->email)->first();

        $response->assertJson([
            "id" => $guest->id,
            "first_name" => $guest->first_name,
            "last_name" => $guest->last_name,
            "email" => $guest->email,
            "phone" => $guest->phone,
            "country" => $guest->country]);

        // Успешное создание гостя с вычислением страны.
        $guest = Guest::factory()->make()->toArray();
        $country = Country::factory()->create();
        $guest["country"] = null;
        $phone = preg_replace('/^[^-]*(-)/', '$1', $guest['phone']);
        $guest['phone'] = $country->phone_code . $phone;
        $response = $this->post('/api/guests', $guest);
        $response->assertOk();
        $guest = Guest::where('email', '=', $guest['email'])->first();
        $response->assertJson([
            "id" => $guest->id,
            "first_name" => $guest->first_name,
            "last_name" => $guest->last_name,
            "email" => $guest->email,
            "phone" => $guest->phone,
            "country" => $guest->country]);

        // Успешное создание гостя без страны.
        $guest = Guest::factory()->make()->toArray();
        $guest['country'] = null;
        $response = $this->post('/api/guests', $guest);
        $response->assertOk();
        $guest = Guest::where('email', '=', $guest['email'])->first();
        $response->assertJson([
            "id" => $guest->id,
            "first_name" => $guest->first_name,
            "last_name" => $guest->last_name,
            "email" => $guest->email,
            "phone" => $guest->phone,
            "country" => null]);
    }

    /**
     * @return void
     */
    public function testSuccessUpdateGuest(): void
    {
        $guest = Guest::factory()->create();
        $data = [
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
        ];
        $response = $this->patch('/api/guests/' . $guest->id, $data);
        $response->assertOk();
        $response->assertJson([
            "id" => $guest->id,
            "first_name" => $data['first_name'],
            "last_name" => $data['last_name'],
            "email" => $guest->email,
            "phone" => $guest->phone,
            "country" => $guest->country]);
    }

    /**
     * @return void
     */
    public function testNoSuccessUpdateGuest(): void
    {
        $guest = Guest::factory()->create();
        $data = [
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
        ];
        $response = $this->patch('/api/guests/' . 2, $data);
        $response->assertStatus(404);
        $response->assertJson([
            'message' => GuestEnum::NO_GUEST,
            "error" => self::NO_QUERY_RESULTS]);
    }

    /**
     * @return void
     */
    public function testSuccessDeleteGuest(): void
    {
        $guest = Guest::factory()->create();
        $response = $this->delete('/api/guests/' . $guest->id);
        $response->assertOk();
        $response->assertJson([
            "message" => GuestEnum::GUEST_DELETED,
            'data' => ["id" => $guest->id,
                "first_name" => $guest->first_name,
                "last_name" => $guest->last_name,
                "email" => $guest->email,
                "phone" => $guest->phone,
                "country" => $guest->country]]);
    }

    /**
     * @return void
     */
    public function testNoSuccessDeleteGuest(): void
    {
        $response = $this->delete('/api/guests/' . 2);
        $response->assertStatus(404);
        $response->assertJson([
            'message' => GuestEnum::NO_GUEST,
            "error" => self::NO_QUERY_RESULTS]);
    }
}
