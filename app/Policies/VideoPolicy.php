<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Access\Response;

class VideoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Video $video)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Video $video)
    {
        return $user->id == $video->user_id ? Response::allow() : Response::deny(__('message.This action is unauthorized.'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Video $video)
    {
        return $user->id == $video->user_id ? Response::allow() : Response::deny(__('message.This action is unauthorized.'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Video $video)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Video $video)
    {
        //
    }
}
