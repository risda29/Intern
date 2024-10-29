<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->leveluser == '') {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->leveluser == 'Admin Puskesmas') {
            $flashdata = session()->getFlashdata('loginSuccess');
            if ($flashdata) {
                echo '<script>
                        document.addEventListener("DOMContentLoaded", function () {
                            Swal.fire({
                                icon: "success",
                                title: "' . $flashdata . '",
                                text: "",
                                showConfirmButton: true,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "' . base_url('profilweb') . '";
                                }
                            });
                        });
                    </script>';
            } else {
                return redirect()->to('profilweb');
            }
        }
    }
}
