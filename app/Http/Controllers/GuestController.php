<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Http\Requests\Guests\GuestCreateRequest;
use App\Http\Requests\Guests\GuestUpdateRequest;
use App\Http\Resources\GuestResource;
use App\Models\Enums\GuestEnum;
use App\Services\GuestService;
use Illuminate\Http\JsonResponse;

class GuestController extends Controller
{
    protected $guestService;

    public function __construct(GuestService $guestService)
    {
        $this->guestService = $guestService;
    }

    /**
     * Получить всех гостей (index)
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $guests = $this->guestService->getAllGuests();
        return response()->json(GuestResource::collection($guests), 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Возвращает гостя по $id.
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        try {
            $guest = $this->guestService->getGuestById($id);
            return response()->json(new GuestResource($guest), 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $exception) {
            return response()->json(['message' => GuestEnum::NO_GUEST, 'error' => $exception->getMessage()], JsonResponse::HTTP_NOT_FOUND, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Создать нового гостя (store).
     * @param GuestCreateRequest $request
     * @return JsonResponse
     */
    public function store(GuestCreateRequest $request): JsonResponse
    {
        $guest = $this->guestService->createGuest($request->validated());
        return response()->json(new GuestResource($guest), 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Обновить гостя (update).
     * @param GuestUpdateRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(GuestUpdateRequest $request, $id): JsonResponse
    {
        try {
            $guest = $this->guestService->updateGuest($id, $request->validated());
            return response()->json(new GuestResource($guest), 200, [], JSON_UNESCAPED_UNICODE);
        } catch (\Exception $exception) {
            return response()->json(['message' => GuestEnum::NO_GUEST, 'error' => $exception->getMessage()], JsonResponse::HTTP_NOT_FOUND, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * Удалить гостя (destroy)
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        try {
            $guest = $this->guestService->deleteGuest($id);
            return response()->json(['message' => GuestEnum::GUEST_DELETED, 'data' => new GuestResource($guest)]);
        } catch (\Exception $exception) {
            return response()->json(['message' => GuestEnum::NO_GUEST, 'error' => $exception->getMessage()], JsonResponse::HTTP_NOT_FOUND, [], JSON_UNESCAPED_UNICODE);
        }
    }
}
