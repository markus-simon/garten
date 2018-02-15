<?php

namespace App\Listener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class SaveEvent
{
    public function onSaveBefore($event)
    {
        $image = $event['image'];
        $exif = exif_read_data($image);
/*        $uploadedFile->tempName

        if(exif_imagetype($uploadedFile->tempName) == 2)//2 IMAGETYPE_JPEG
        {
            $exif = exif_read_data($uploadedFile->tempName);
            if(!empty($exif['Orientation']))
            {
                $image = imagecreatefromjpeg($uploadedFile->tempName);

                switch($exif['Orientation'])
                {
                    case 8:
                        $image = imagerotate($image,90,0);
                        break;
                    case 3:
                        $image = imagerotate($image,180,0);
                        break;
                    case 6:
                        $image = imagerotate($image,-90,0);
                        break;
                }
                imagejpeg($image, $uploadedFile->tempName);
            }
        }*/




        $vvv = $event;
        return $event;
    }

    public function onSaveAfter($event)
    {
        $vvv = $event;
        return $event;
    }
}