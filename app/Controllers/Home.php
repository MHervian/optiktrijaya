<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->pengguna = new PenggunaModel();
    }

    public function index()
    {
        $session = session();
        if (isset($session->username)) {
            return redirect()->to(base_url("dashboard"));
        }

        $data = array("pageTitle" => "Log In");
        $loginStatus = ($session->getFlashdata("loginStatus")) ? $session->getFlashdata("loginStatus") : null;
        $data["loginStatus"] = $loginStatus;

        return view("v_login", $data);
    }

    public function login()
    {
        $request = service("request");
        $email = $request->getPost("email");
        $password = $request->getPost("password");

        $session = session();
        if (empty($email)) {
            $loginStatus = "login failed";
            $session->setFlashdata("loginStatus", $loginStatus);
            return redirect()->to(base_url());
        }

        $result = $this->pengguna->getUser($email);

        // Check if not found one row
        if (empty($result)) {
            $loginStatus = "login failed";
            $session->setFlashdata("loginStatus", $loginStatus);
            return redirect()->to(base_url());
        }

        // Verify password
        if (password_verify($password, $result["pass"])) {
            $session->set(["username" => $result["username"]]);
            $session->set(["level" => $result["lvl_akses"]]);

            return redirect()->to(base_url("dashboard")); // Redirect to dashboard
        }

        // Return to login page if failed
        $loginStatus = "login failed";
        $session->setFlashdata("loginStatus", $loginStatus);
        return redirect()->to(base_url());
    }

    public function logout()
    {
        // Destroy session
        $session = session();
        $session->remove("username");
        $session->remove("level");

        $loginStatus = "logout success";
        $session->setFlashdata("loginStatus", $loginStatus);
        return redirect()->to(base_url());
    }
	
}
