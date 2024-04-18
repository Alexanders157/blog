<?php

namespace App\Libraries\Qr;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Image;

class CustomImageQr extends Image
{
    public function getWidth()
    {
        return $this->width + $this->width;
    }
}
