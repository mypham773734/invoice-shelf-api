<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id, 
            'name' => $this->name, 
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'contact_name' => $this->contact_name,
            'company_name' => $this->company_name,
            'website' => $this->website ?? '',
            'enable_portal' => $this->enable_portal,
            'currency_id' => $this->currency_id,
            'facebook_id' => $this->facebook_id,
            'google_id' => $this->google_id,
            'github_id' => $this->github_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'avatar' => $this->avatar,
            'is_owner' => $this->isOwner(),
            'roles' => $this->roles, 
            'formatted_created_at' => $this->formatted_created_at, 
            // 'currency' => $this->when($this->currency()->exists(), function(){
            //     return 'currency_resource'; 
            // }), 
            // 'companies' => $this->when($this->companies()->exists(), function(){
            //     return 'companies_resource'; 
            // }), 
        ]; 
    }
}
