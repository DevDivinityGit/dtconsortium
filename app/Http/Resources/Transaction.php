<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Transaction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
         'id' => $this->id,
         'transaction_id' => $this->transaction_id,
         'user_id' => $this->user_id,
            'amount' => $this->amount,
            'image' => $this->image,
         'status' => $this->status,
            'user' => $this->user,


        ];
    }
}
