<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'name'=>$this->name,
            'description'=>$this->detail,
            'totalPrice'=>round((1-($this->discount/100)) * $this->price,2),
            'rating'=>$this->reviews->count() >0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) :'Not rating Yet',
            'discount'=>$this->discount,
            'href'=>
            [
                'reviews'=>route('products.show',$this->id)
            ]

        ];
    }
}
