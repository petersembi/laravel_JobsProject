<?php

namespace App\Models;

class Listing {
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, commodi.'

            ], 
            [
                'id' => 2,
                'title' => 'Listing two',
                'description' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, commodi.'

            ]

            ];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if($listing['id']==$id){
                return $listing;
            }
        }
    }
}