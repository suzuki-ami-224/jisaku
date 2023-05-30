<?php

namespace App\Policies;

use App\Instructor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InstructorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any instructors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the instructor.
     *
     * @param  \App\User  $user
     * @param  \App\Instructor  $instructor
     * @return mixed
     */
    public function view(User $user, Instructor $instructor)
    {
        return $user->id === $instructor->user_id;

    }

    /**
     * Determine whether the user can create instructors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the instructor.
     *
     * @param  \App\User  $user
     * @param  \App\Instructor  $instructor
     * @return mixed
     */
    public function update(User $user, Instructor $instructor)
    {
        //
    }

    /**
     * Determine whether the user can delete the instructor.
     *
     * @param  \App\User  $user
     * @param  \App\Instructor  $instructor
     * @return mixed
     */
    public function delete(User $user, Instructor $instructor)
    {
        //
    }

    /**
     * Determine whether the user can restore the instructor.
     *
     * @param  \App\User  $user
     * @param  \App\Instructor  $instructor
     * @return mixed
     */
    public function restore(User $user, Instructor $instructor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the instructor.
     *
     * @param  \App\User  $user
     * @param  \App\Instructor  $instructor
     * @return mixed
     */
    public function forceDelete(User $user, Instructor $instructor)
    {
        //
    }
}
