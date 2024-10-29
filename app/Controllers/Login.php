<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use ReCaptcha\ReCaptcha;

class Login extends BaseController
{
    protected $session;

    public function __construct()
    {
        // Load the session library
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('login/v_login');
    }

    public function cekUser()
    {
        $username = $this->request->getPost('username');
        $plainPassword = $this->request->getPost('pw');
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');

        // Validasi reCAPTCHA
        $recaptcha = new ReCaptcha('6LftaRcpAAAAAIOlz1tWd4x6m4lRm2fh1Dw8C5aj');
        $result = $recaptcha->verify($recaptchaResponse);

        if (!$result->isSuccess()) {
            // reCAPTCHA validation failed
            session()->setFlashdata('recaptcha', 'Validasi reCAPTCHA gagal. Harap coba lagi.');
            return redirect()->to(base_url('/login'));
        }

        // Validasi form lainnya
        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.'
                ]
            ],
            'pw' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d])[\s\S]+$/]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'min_length' => 'Password harus terdiri dari minimal 8 karakter.',
                    'regex_match' => 'Password harus mengandung angka, huruf besar, huruf kecil, dan simbol.'
                ]
            ],
        ]);

        if (!$valid) {
            $sessError = [
                'errUsername' => $validation->getError('username'),
                'errPw' => $validation->getError('pw'),
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(base_url('/login'));
        } else {
            $modelLogin = new ModelLogin();

            // Cek apakah username ada di database
            $cekUserLogin = $modelLogin->where('username', $username)->first();

            if ($cekUserLogin == null) {
                $sessError = [
                    'errUsername' => 'Username yang Anda masukkan tidak terdaftar.'
                ];
                session()->setFlashdata($sessError);
                return redirect()->to(base_url('/login'));
            } else {
                $hashedPasswordFromDatabase = $cekUserLogin['pw'];

                // Memverifikasi password dengan password_verify
                if (password_verify($plainPassword, $hashedPasswordFromDatabase)) {
                    // Password cocok
                    $leveluser = $cekUserLogin['leveluser'];

                    $simpan_session = [
                        'username' => $username,
                        'leveluser' => $leveluser
                    ];
                    session()->set($simpan_session);

                    $this->session->setFlashdata('loginSuccess', 'Login Berhasil!');
                    return redirect()->to(base_url('/login'));
                    // return redirect()->to(base_url('profilweb'));
                } else {
                    // Password tidak cocok
                    $sessError = [
                        'errPw' => 'Password yang Anda masukkan salah.'
                    ];
                    session()->setFlashdata($sessError);
                    return redirect()->to(base_url('/login'));
                }
            }
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
