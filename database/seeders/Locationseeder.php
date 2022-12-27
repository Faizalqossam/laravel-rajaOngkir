<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Province;
use App\Models\City;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class Locationseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ambil semua data provinsi dari package
        $daftarProvinsi = RajaOngkir::provinsi()->all();

        foreach ($daftarProvinsi as $provinceRow) {
        //lalu looping data provinsi dan input ke dalam table
            Province::create([
                'province_id' => $provinceRow['province_id'],
                'name'        => $provinceRow['province'],
            ]);

            //ambil data kota berdasarkan id provinsi
            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();

            foreach ($daftarKota as $cityRow) {
                //lalu looping data kota dan input ke dalam table
                City::create([
                    'province_id'   => $provinceRow['province_id'],
                    'city_id'       => $cityRow['city_id'],
                    'name'          => $cityRow['city_name'],
                ]);
            }
        }
    }
}
