<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    protected $prop = 0;
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
            'name' => $this->name,
            'category' => $this->category,
            'price' => $this->price,
            'status' => isset($this->pivot) ? $this->pivot->task_status : null,
            'image' => isset($this->pivot) ? $this->pivot->image : null,
            'submitted_time' => isset($this->pivot) ?  date('Y-M-D h:m', strtotime($this->pivot->created_at)) : null,



            'task_link' => $this->task_link,
            'user' => $this->userData,
            'demand' => $this->demand,
            'remaining' => $this->remaining,
            'task_image' => $this->image,
            'description' => $this->description,
            'time' => date('Y-M-D h:m', strtotime($this->created_at)),
//            'user' => $this->users()->find(++$this->prop),


        ];
    }
}
