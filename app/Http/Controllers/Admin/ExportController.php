<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;

class ExportController extends Controller
{
    /**
     * Export data from database to docx.
     * 
     * @return void
     */
    public function exportToPDF(Personal $personal)
    {
        $personal = Personal::find($personal->id);

        $phpWord = new TemplateProcessor(public_path('template/doc-template.docx'));
        $phpWord->setValue('fullname', $personal->fullname);
        $phpWord->setValue('nickname', $personal->nickname);
        $phpWord->setValue('gender', $personal->gender);
        $phpWord->setValue('place_of_birth', $personal->place_of_birth);
        $phpWord->setValue('date_of_birth', $personal->date_of_birth);
        $phpWord->setValue('religion', $personal->religion);
        $phpWord->setValue('everyday_language', $personal->everyday_language);
        $phpWord->setValue('body_height', $personal->body_height);
        $phpWord->setValue('body_weight', $personal->body_weight);
        $phpWord->setValue('distance', $personal->distance);
        $phpWord->setValue('father_name', $personal->father_name);
        $phpWord->setValue('mother_name', $personal->mother_name);
        $phpWord->setValue('father_education', $personal->father_education);
        $phpWord->setValue('mother_education', $personal->mother_education);
        $phpWord->setValue('father_job', $personal->father_job);
        $phpWord->setValue('mother_job', $personal->mother_job);
        $phpWord->setValue('father_age', $personal->father_age);
        $phpWord->setValue('mother_age', $personal->mother_age);
        $phpWord->setValue('education_category', $personal->education_category);
        $phpWord->setImageValue('birth_certificate', storage_path('app/public/' . $personal->birth_certificate));
        $phpWord->setImageValue('identity_card', storage_path('app/public/' . $personal->identity_card));
        $phpWord->setImageValue('family_card', storage_path('app/public/' . $personal->family_card));
        $phpWord->setImageValue('avatar', storage_path('app/public/' . $personal->avatar));
        $phpWord->setImageValue('school_certificate', storage_path('app/public/' . $personal->school_certificate));
        $phpWord->saveAs(storage_path('app/public/exports/' . $personal->fullname . '-doc-template.docx'));

        return Storage::download('exports/' . $personal->fullname . '-doc-template.docx');
    }
}
