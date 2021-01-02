<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'name' => $this->last_name . ', ' . $this->first_name . ' ' . $this->middle_name,
            'contact_info' => [
                'email' => $this->email,
                'contact_no' => $this->contact_no,
            ],
            'other_information' => [
                'birthdate' => $this->birthdate,
                'address' => $this->address,
                'gender' => $this->gender,
                'civil_status' => $this->civil_status,
                'religion' => $this->religion,
                'nationality' => $this->nationality,
                'place_of_birth' => $this->place_of_birth,
            ],
            'courses' => CourseResource::collection($this->whenLoaded('courses')),
        ];
    }
}
