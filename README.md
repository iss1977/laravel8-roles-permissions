## Laravel users and permissions

Created with the help of brief video from "Laravel Daily"

link to video :  https://youtu.be/kZOgH3-0Bko

Migration and seeding :

_php artisan migrate:fresh --seed_

In this project we are creating :

 - separate Controller and Views for Admin and User
 - creating an "class IsAdminMiddleware" to determin if the logged in user is admin or user
 - * adding a function to LoginController to set the redirection to differet pathes for user and admin.

 - creating  different Controllers and views for admin and users 
 - admin index view with pagination
 - edit task -> not implemented, but permission can be checked
 - delete task -> implemented, whitout confirmation

Note: 
Using _ $this->authorize('tasks-edit');_ in Controller method can be used without _IsAdminMiddleware_
to prevent unauthorized access ti controller methods
Abilities must be resgistred in AuthServiceProvider. Ex: "Gate::define('tasks-edit', fn(User $user) => $user->is_admin);"


