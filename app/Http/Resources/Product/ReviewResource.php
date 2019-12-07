<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ReviewResource extends Resource
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
            'customer'=>$this->customer,
            'body'=>$this->review,
            'star'=>$this->count() >0 ? round($this->sum('star')/$this->count(),2) :'Not rating Yet',

        ];
    }
}
