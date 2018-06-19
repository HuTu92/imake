<?php

namespace imake\Policies;

use imake\User;
use imake\Chat;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the chat.
     *
     * @param  \imake\User  $user
     * @param  \imake\Chat  $chat
     * @return mixed
     */
    public function view(User $user, Chat $chat)
    {
        //
        if($user->id === $chat->user->id || $user->id === $chat->vendor->id){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create chats.
     *
     * @param  \imake\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the chat.
     *
     * @param  \imake\User  $user
     * @param  \imake\Chat  $chat
     * @return mixed
     */
    public function update(User $user, Chat $chat)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the chat.
     *
     * @param  \imake\User  $user
     * @param  \imake\Chat  $chat
     * @return mixed
     */
    public function delete(User $user, Chat $chat)
    {
        return false;
    }
}
