<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class ImageController extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form' . 'image']);


        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'theFile' => [
                'rules' => 'uploaded[theFile.0]|is_image[theFile]',
                'label' => 'The File'
                ]
            ];

            if ($this->validate($rules)) {
                // $path = './uploads/images/manipulated';
                $file = $this->request->getFile('theFile');
                echo $file->getName();
                exit(); 


            //    $image = service('image');

            //     foreach ($file['theFile'] as $file) {
            //         if ($file->isValid() && !$file->hasMoved()) {

            //            $file->move($path);
            //            $fileName = $file->getName();

            //         if(!file_exists($path. 'thumbs/')) 
            //             mkdir($path . 'thumbs/', 755);

            //            $image->withFile(src($fileName))
            //            ->fit(150, 150 , 'center')
            //            ->save($path. 'thumbs/' . $fileName);
            //         }
            //     }
            
                //$session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/imagesettings');
            }
        }
        echo view('/pages/imagesettings', $data);
    }


}
