<?php

use App\Modules\Files\Enums\FileSignTypeEnum;
use App\Modules\Files\FilePathHelper;
use Illuminate\Database\Seeder;
use App\Modules\Challenges\Models\Company;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ArchieveCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $archieveCompanyName = 'Archieve';
        $archieveCompanyType = 'archive';
        try {
            Company::where('name', $archieveCompanyName)
                ->where('type', $archieveCompanyType)
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $file = new \Illuminate\Http\UploadedFile(public_path('/assets/images/archieve-company-image.png'), str_random());
            $path = FilePathHelper::getPath(FileSignTypeEnum::COMPANY_LOGO);
            $fileName = $file->storeAs(
                $path,
                pathinfo($file->hashName(), PATHINFO_FILENAME) . '.' . $file->getClientOriginalExtension()
            );
            $company = app(Company::class);
            $company->fill([
                'name' => 'Archieve',
                'type' => 'archive',
                'info' => 'Company contain challenges of removed companies',
                'logo' => $fileName,
            ]);
            $company->save();
        }

    }
}
