<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\CompanyMeta;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::create([
            'name' => 'Sample Company',
            'email' => 'info@example.com',
            'phone' => '1234567890',
            'address' => '123 Main St, City, Country',
            'website' => 'https://example.com',
            'google_map' => '<iframe src="https://maps.google.com/..."></iframe>',
            'is_active' => 1,
        ]);

        $metaData = [
            ['meta_key' => 'brochure_attachment', 'meta_value' => 'path/to/brochure.pdf'],
            ['meta_key' => 'email2', 'meta_value' => 'support@example.com'],
            ['meta_key' => 'phone2', 'meta_value' => '0987654321'],
            ['meta_key' => 'whatsapp2', 'meta_value' => '0987654321'],
            ['meta_key' => 'address2', 'meta_value' => '456 Secondary Street, City, Country'],
            ['meta_key' => 'google_map2', 'meta_value' => '<iframe src="https://maps.google.com" ...></iframe>'],
            ['meta_key' => 'facebook_url', 'meta_value' => 'https://facebook.com/samplecompany'],
            ['meta_key' => 'instagram_url', 'meta_value' => 'https://instagram.com/samplecompany'],
            ['meta_key' => 'linkedin_url', 'meta_value' => 'https://linkedin.com/company/samplecompany'],
            ['meta_key' => 'youtube_url', 'meta_value' => 'https://youtube.com/samplecompany'],
        ];

        foreach ($metaData as $meta) {
            $company->meta()->create($meta);
        }
    }
}
