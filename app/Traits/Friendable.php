<?php

namespace App\Traits;
use App\friendships;
trait Friendable {

    public function test() {

        return 'hi';
    }

    public function addFriend($id){
        $Friendship = friendships::create([
            'requester' => $this->id, // yang lgoin
            'user_requested' => $id,

        ]);

        if($Friendship)
        {

            return $Friendship;
        }

        return 'failed';

    }


}
