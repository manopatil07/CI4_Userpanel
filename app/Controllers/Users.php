<?php

namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        helper(['form']);
        return  view('Users/home.php');
    }
    public function UserCreate()
    {
        helper(['form']);
        return  view('Users/User_registration.php');
    }
    public function Usersignup()
    {
        $session = session();
        $data = [];
        helper('form');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'phone' => 'required|min_length[10]|max_length[11]',
                'password' => 'required|min_length[4]|max_length[255]',
                'Con_password' => 'matches[password]',
                'dob' => 'required',
                'address' => 'required|min_length[10]|max_length[200]',
                'hobb' => 'required',
                'img' => [
                    'label' => 'Image File',
                    'rules' => 'uploaded[img]'.'|is_image[img]'.'|mime_in[img,image/jpg,image/jpeg,image/png]' ],
                'city' => 'required'
            ];
            if ($this->validate($rules))
            {
                $data['validation'] = $this->validator;
                $model = new UserModel();
                $img = $this->request->getFile('img');
                if (!$img->hasMoved())
                {
                    $imgName = $img->getRandomName();
                    $img->move('uploads/', $imgName);
                    $Data = [
                        'name' => $this->request->getVar('name'),
                        'email' => $this->request->getVar('email'),
                        'phone' => $this->request->getVar('phone'),
                        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                        'dob' => $this->request->getVar('dob'),
                        'address' => $this->request->getVar('address'),
                        'gender' => $this->request->getVar('gender'),
                        'hobb' =>  implode(',', $this->request->getVar('hobb')),
                        'img' => $imgName,
                        'city' => $this->request->getVar('city'),
                        'create_time' => date('Y-m-d H:i:s')
                    ];
                    $model->save($Data);
                    $session->setFlashdata('success', 'data Add successfully !!');
                    return redirect()->to('/User_create');
                }
            } 
            else{
                $data['validation'] = $this->validator;
                return view('Users/User_registration', $data);
            }
        }
    }
    public function UserSignIn()
    {
        helper(['form']);
        return view('Users/User_signIn');
    }
    public function UserLogIn()
    {
        $session = session();
        $data = [];
        helper(['form']);
        if ($this->request->getMethod() == "post") {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[4]|max_length[255]'
            ];
            if ($this->validate($rules)) {
                $model = new UserModel();
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $userdata = $model->where('email', $email)->first();
                if ($userdata) {
                    $pass = $userdata['password'];
                    $auth = password_verify($password, $pass);
                    if ($auth) {
                        $ses_data = [
                            'Id' => $userdata['Id'],
                            'name' => $userdata['name'],
                            'email' => $userdata['email'],
                            'phone' => $userdata['phone'],
                            'dob' => $userdata['dob'],
                            'address' => $userdata['address'],
                            'gender' => $userdata['gender'],
                            'hobb' => $userdata['hobb'],
                            'img' => $userdata['img'],
                            'city' => $userdata['city'],
                            'isLoggedIn' => TRUE
                        ];
                        $session->set($ses_data);
                        return redirect()->to('/user_Home');
                    } else {
                        $session->setFlashdata('msg', 'Password is incorrect.');
                        return redirect()->to('/UserSignIn');
                    }
                } else {
                    $session->setFlashdata('msg', 'Email does not exist.');
                    return redirect()->to('/UserSignIn');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('Users/User_signIn', $data);
            }
        }
    }
}
