<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;

class QRCodeController extends Controller
{
    public function generate($id)
    {
        $surat = SuratMasuk::findOrFail($id);

        if (!$surat->lampiran) {
            abort(404, 'Surat ini tidak memiliki lampiran.');
        }

        // Ganti IP ini dengan hasil ipconfig kamu kalau berbeda
        $fileUrl = 'http://10.219.34.72:8000/storage/' . $surat->lampiran;

        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($fileUrl)
            ->encoding(new Encoding('UTF-8'))
            ->size(300)
            ->margin(10)
            ->build();

        return response($result->getString())
            ->header('Content-Type', $result->getMimeType());
    }
}
