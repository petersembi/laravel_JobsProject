<?php

namespace App\Models;

class Listing {
    public static function all()
    {
        // return an array
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
        // call the all function, assign the returned value to $listings
        $listings = self::all();

        // loop through the listings, return only the listing whose id is equal to the id passed 
        foreach($listings as $listing) {
            if($listing['id']==$id){
                return $listing;
            }
        }
    }
}