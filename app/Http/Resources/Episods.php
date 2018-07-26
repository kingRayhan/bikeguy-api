<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Episods extends JsonResource
{
    public function toArray($request)
    {
        return [
            'episod_no' => $this->episod_no,
            'topic' => $this->topic,
            'audio' => url('/') . $this->audio_public
        ];
    }
}
