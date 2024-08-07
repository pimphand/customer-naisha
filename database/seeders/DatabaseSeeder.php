<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan file SQL untuk mengisi tabel area_provinces
        $provinceSqlFile = database_path('area_provinces.sql');
        if (file_exists($provinceSqlFile)) {
            $provinceSql = file_get_contents($provinceSqlFile);
            Log::info("Running SQL file $provinceSqlFile");
            DB::unprepared($provinceSql);

            // Lanjutkan dengan city jika province berhasil diisi
            $this->seedCities();
        } else {
            Log::error("File $provinceSqlFile not found.");
        }
    }

    /**
     * Seed the application's database with data for area_cities, area_districts, and area_subdistricts.
     */
    private function seedCities(): void
    {
        // Jalankan file SQL untuk mengisi tabel area_cities
        $citySqlFile = database_path('area_cities.sql');
        if (file_exists($citySqlFile)) {
            $citySql = file_get_contents($citySqlFile);
            Log::info("Running SQL file $citySqlFile");
            DB::unprepared($citySql);

            // Lanjutkan dengan district jika city berhasil diisi
            $this->seedDistricts();
        } else {
            Log::error("File $citySqlFile not found.");
        }
    }

    /**
     * Seed the application's database with data for area_districts and area_subdistricts.
     */
    private function seedDistricts(): void
    {
        // Jalankan file SQL untuk mengisi tabel area_districts
        $districtSqlFile = database_path('area_districts.sql');
        if (file_exists($districtSqlFile)) {
            $districtSql = file_get_contents($districtSqlFile);
            Log::info("Running SQL file $districtSqlFile");
            DB::unprepared($districtSql);

            // Lanjutkan dengan subdistrict jika district berhasil diisi
            $this->seedSubdistricts();
        } else {
            Log::error("File $districtSqlFile not found.");
        }
    }

    /**
     * Seed the application's database with data for area_subdistricts.
     */
    private function seedSubdistricts(): void
    {
        // Jalankan file SQL untuk mengisi tabel area_subdistricts
        $subdistrictSqlFile = database_path('area_subdistricts.sql');
        if (file_exists($subdistrictSqlFile)) {
            $subdistrictSql = file_get_contents($subdistrictSqlFile);
            Log::info("Running SQL file $subdistrictSqlFile");
            DB::unprepared($subdistrictSql);
        } else {
            Log::error("File $subdistrictSqlFile not found.");
        }
    }
}
