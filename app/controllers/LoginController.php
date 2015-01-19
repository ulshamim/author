<?php

use Redooor\Redminportal\User;

class LoginController extends BaseController {

    protected $model;

    public function __construct(User $user) {
        $this->model = $user;
    }

    public function getIndex() {
        return View::make('users/login');
    }

    public function getUnauthorized() {
        return View::make('redminportal::users/notauthorized');
    }

    public function getLogout() {
        // Logs the user out
        Sentry::logout();
        return Redirect::to('/');
    }

    public function postLogin() {
        /*
         * Validate
         */
        $rules = array(
            'email' => 'required|email',
            'password' => 'required',
        );

        $validation = Validator::make(\Input::all(), $rules);

        if ($validation->passes()) {
            $email = Input::get('email');
            $password = Input::get('password');

            try {
                $credentials = array(
                    'email' => $email,
                    'password' => $password,
                );

                // Authenticate the user
                Sentry::authenticate($credentials, false);
            } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                $errors = new \Illuminate\Support\MessageBag;
                $errors->add('invalid', "This user hasn't been activated. Please contact us for support.");

                return Redirect::to('admin')->withErrors($errors)->withInput();
            } catch (Exception $e) {
                $errors = new \Illuminate\Support\MessageBag;
                $errors->add('invalid', "Oops, your email or password is incorrect.");

                return Redirect::to('users/login')->withErrors($errors)->withInput();
            }
            if (Sentry::getUser()->hasAccess('admin')) {
                return Redirect::to('/admin');
            } else {
                return Redirect::to('/');
            }
        }

        return Redirect::to('users/login')->withErrors($validation)->withInput();
    }

}
