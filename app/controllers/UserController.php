<?php

class UserController extends \BaseController
{

    /**
    * Display a login form
    *
    * @return View user/login
    */
    public function getLogin()
    {
        return View::make('user/login');
    }

    /**
    * Post request for login form
    *
    * @return Response
    */
    public function postLogin()
    {

        $rules = [
            'email' => 'required',
            'password' => 'required|password'
        ];

        Validator::extend('password', function ($attribute, $value, $parameters) {
            $credentials = [ 'email' => Input::get('email'), 'password' => Input::get('password') ];

            return Auth::attempt($credentials);
        }
        );

        $messages = [
            'password' => 'Email Address and/or password incorrect!',
        ];

        $validation = Validator::make(Input::all(), $rules, $messages);

        if ($validation->fails()) {
            return Redirect::to('user/login')->withErrors($validation);
        } else {

            // Touch the users row to cause updated on to regenerate
            User::find(Auth::user()->id)->touch();

            return Redirect::to('/')->with('success', "Successfully logged in !");
        }

    }

    /**
    * Show the register form
    *
    * @return View user/register
    */
    public function getRegister()
    {
        return View::make('user/register');
    }

    /**
    * Post request for register form
    *
    * @return Redirect
    */
    public function postRegister()
    {
        $rules = [
            'display_name'  => 'required|max:50|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|same:password_confirm|min:5',
        ];

        $input = Input::all();

        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('user/register')->withErrors($validation);
        } else {

            try {

                $user = new User();
                $user->display_name = Input::get('display_name');
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->ip_address = $_SERVER['REMOTE_ADDR'];
                $user->save();

                Auth::login($user);

                return Redirect::to('/')->with('success', "Successfully Created User Account!");
            } catch (Exception $e) {
                Log::write('info', $e->__toString());
                echo "Error creating user account.";
            }
        }
    }

    /**
     * Form that allows users to set their goals
     *
     * @return View user/goals
     */
    public function getGoals()
    {
        $this->beforeFilter('auth');
        return View::make('user.goals');
    }

    /**
     * Post request for updating users goals
     *
     * @return View user/goals
     */
    public function postGoals()
    {
        $this->beforeFilter('auth');

        $rules = [
            'calories' => 'numeric|between:0,9999',
            'protein' => 'numeric|between:0,999',
            'carbohydrates' => 'numeric|between:0,999',
            'fat' => 'numeric|between:0,999',
            'user_id' => Auth::user()->id,
        ];

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            Input::flash();
            return Redirect::to('user/goals')->withErrors($validator);
        } else {

            $user = User::find(Auth::user()->id);

            $user->calories = Input::get('calories');
            $user->protein = Input::get('protein');
            $user->carbohydrates = Input::get('carbohydrates');
            $user->fat = Input::get('fat');

            $user->save();

            return Redirect::to('user/goals')->with('success', "Successfully updated your goals!");
        }
    }

    /**
    * Logout request
    *
    * @return Redirect
    */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('user/login')->with('success', "Successfully logged out!");
    }

    /**
     * Delete all user accounts who have not logged in more then 60 days
     *
     * @return Null
     */
    public function getCleanup()
    {
        // Calculate date in 60 days
        $date = new DateTime();
        $date->modify('-60 day');

        // Get all users where last login is > 60
        $users = User::where('updated_at', '<=', $date->format('Y-m-d H:i:s'))->get();

        foreach ($users as $user) {
            // Delete all users items
            Item::where('user_id', $user->id)->delete();

            // Delete all users plans
            Plan::where('user_id', $user->id)->delete();

            // Delete all users shares
            Share::where('user_id', $user->id)->delete();

            // Delete the user account
            User::destroy($user->id);
        }
    }
}
