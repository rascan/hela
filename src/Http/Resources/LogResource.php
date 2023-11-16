<?php

namespace Rascan\Hela\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'log_uid' => $this->log_uid,
            'success' => (boolean) $this->success,
            'log_level' => $this->log_level,
            'status_code' => $this->status_code,
            'message' => $this->message,
            'request_details' => json_decode($this->request_details),
            // 'message' => $this->message,

            // $table->json('request_details');
            // $table->json('response_details');
        ];
    }
}
