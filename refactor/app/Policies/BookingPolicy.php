<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;
	
	
	/**
	 * Perform pre-authorization checks.
	 *
	 * @param  \App\Models\User  $user
	 * @param  string  $ability
	 * @return void|bool
	 */
	public function before(User $user, $ability)
	{
		//
			
	}

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }
	
	


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\project_item  $project_item
     * @return mixed
     */
    public function view(User $user, project_item $project_item)
    {
       //
    }
	
	

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
		
       return $user->user_type == config('app.CUSTOMER_ROLE_ID');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\project_item  $project_item
     * @return mixed
     */
    public function update(User $user, project_item $project_item)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\project_item  $project_item
     * @return mixed
     */
    public function delete(User $user, project_item $project_item)
    {
       //
    }
	

}
