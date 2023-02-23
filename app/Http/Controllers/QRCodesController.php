<?php

namespace App\Http\Controllers;

use App\Models\QRCodes;
use App\Models\School;
use App\Models\Students;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class QRCodesController extends Controller
{
    public function index()
    {
        return view('qr.index', [
            'title' => 'Scan QR Codes',
        ]);
    }

    public function gen_school(School $school)
    {
        $options = new QROptions([
            'version' => 3,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_M,
        ]);

        $qrcode = new QRCode($options);

        $randomCode = bin2hex(random_bytes(3)) . $school->id;
        $imgName = date('Ymd-') . $randomCode . '.png';

        $data = url('') . '/' . 'sch/' . $randomCode;

        $qrcode->render($data, 'img/qr/' . $imgName);

        $dataQr['school_id'] = $school->id;
        $dataQr['qr_url'] = $data;
        $dataQr['qr_page'] = $randomCode;
        $dataQr['qr_image'] = 'img/qr/' . $imgName;

        // Check QR Image on Storage
        $qrImage = QRCodes::where('school_id', $school->id)->get();

        if ($qrImage->count()) {
            File::delete($qrImage[0]->qr_image);
            QRCodes::where('school_id', $school->id)->update($dataQr);
        } else {
            QRCodes::create($dataQr);
        }
        return back();
    }

    public function gen_students(School $school)
    {
        $students = Students::where('school_id', $school->id)->get();

        $options = new QROptions([
            'version' => 3,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel' => QRCode::ECC_M,
        ]);

        for ($i = 0; $i < $students->count(); $i++) {
            $qrcode = new QRCode($options);

            $randomCode = bin2hex(random_bytes(3)) . $students[$i]->id;
            $imgName = date('Ymd-') . $randomCode . '.png';

            $data = url('') . '/' . 'std/' . $randomCode;
            $qrcode->render($data, 'img/qr/' . $imgName);

            $dataQr['student_id'] = $students[$i]->id;
            $dataQr['qr_url'] = $data;
            $dataQr['qr_page'] = $randomCode;
            $dataQr['qr_image'] = 'img/qr/' . $imgName;

            // Check QR Image on Storage
            $qrImage = QRCodes::where('student_id', $students[$i]->id)->get();

            if ($qrImage->count()) {
                File::delete($qrImage[0]->qr_image);
                QRCodes::where('student_id', $students[$i]->id)->update($dataQr);
            } else {
                QRCodes::create($dataQr);
            }
        }

        return back();
    }
}
