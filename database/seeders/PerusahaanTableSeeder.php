<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Seeder;

class PerusahaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perusahaans = [
            // [
            //     'nama' => 'perusahaan',
            //     'no_telp' => '0812345678',
            //     'bidang' => 'Software House',
            //     'alamat' => 'Kliningan, Bandung',
            //     'email_perusahaan' => 'perusahaan@email.com',
            //     'foto_perusahaan' => '',
            //     'nama_pic' => 'Someone',
            //     'kontak_pic' => '0123456789',
            // ],
            [
                'nama' => 'PT. Neuronworks',
                'no_telp' => '02287309898',
                'bidang' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Komp. Buahbatu Regency A2 no. 9-102',
                'email_perusahaan' => 'neuronworks@email.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Irfan Juniar Pratama Nugraha',
                'kontak_pic' => '08112127606',
                'url' => 'https://www.neuronworks.co.id/'
            ],
            [
                'nama' => 'Birutekno Inc.',
                'no_telp' => '02287319210',
                'bidang' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Grand Sharon Residence, Jl. Sharon Raya Bar. No. 11 Cipamokolan',
                'email_perusahaan' => 'info@birutekno.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Rifki Fadilah Alfarezi',
                'kontak_pic' => '089726378293',
                'url' => 'https://www.birutekno.com/'
            ],
            [
                'nama' => 'WebHade Creative',
                'no_telp' => '081321425825',
                'bidang' => 'Pengembangan Perangkat Lunak',
                'alamat' => 'Jl. Taman Merkuri Timur VI. No. 15 Manjahlega Rancasari',
                'email_perusahaan' => 'info@webhade.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Wisnu Hafid',
                'kontak_pic' => '081321425825',
                'url' => 'https://www.webhadecreative.com/'
            ],
            [
                'nama' => 'Jagad Creative',
                'no_telp' => '02287314168',
                'bidang' => 'Jasa Design',
                'alamat' => 'Jl. Taman Saturnus 1 No.37, Manjahlega, Rancasari',
                'email_perusahaan' => 'info@jagadecreative.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Someone',
                'kontak_pic' => '02287314168',
                'url' => 'http://www.jagadcreative.id/'
            ],
            [
                'nama' => 'CV. Triwikrama',
                'no_telp' => '08497236103',
                'bidang' => 'Software House',
                'alamat' => 'MTC. Blok A 25, Jl. Soekarno Hatta No. 590',
                'email_perusahaan' => 'info@triwikrama.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Dera Niscahya Hapiyani',
                'kontak_pic' => '08497236103',
                'url' => 'http://triwikrama.co.id/'
            ],
            [
                'nama' => 'PT. Someah Creative',
                'no_telp' => '08562294222',
                'bidang' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Jl. Angkik No.3, Cijagra, Kec. Lengkong',
                'email_perusahaan' => 'info@someahkreatif.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Ferry Stephaus Suwita',
                'kontak_pic' => '08562294222',
                'url' => 'https://someah.id/'
            ],
            [
                'nama' => 'PT. Fujicon Priangan Perdana',
                'no_telp' => '02275376767',
                'bidang' => 'Teknik Sipil',
                'alamat' => 'MTC. Kav J31, Jl. Soekarno Hatta No. 590',
                'email_perusahaan' => 'info@fujicon.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Nurul Hidayah',
                'kontak_pic' => '02275376767',
                'url' => 'https://fujicon-japan.com/'
            ],
            [
                'nama' => 'PT. Citra Niaga Abadi',
                'no_telp' => '087364928572',
                'bidang' => 'Managemen Investasi',
                'alamat' => 'Jl. Parakan Saat I No. 37, Manjahlega, Rancasari',
                'email_perusahaan' => 'info@citraniaga.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Muhamad Farid Hidayat',
                'kontak_pic' => '087364928572',
                'url' => 'http://career.cna.co.id/'
            ],
            [
                'nama' => 'CyberLabs',
                'no_telp' => '085723036868',
                'bidang' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Jl. Batununggal Abadi I No. 4',
                'email_perusahaan' => 'info@cyberlabsid.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Indri Apriliani',
                'kontak_pic' => '085723036868',
                'url' => 'https://cyberlabs.co.id/'
            ],
            [
                'nama' => 'PT. Samudra Aplikasi Indonesia',
                'no_telp' => '02287791374',
                'bidang' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Pesona Bali Residence Blok D4 No. 7 Jl. Raya Bojongsoang',
                'email_perusahaan' => 'info@esaku.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Aisyah Ayu Utami',
                'kontak_pic' => '02287791374',
                'url' => 'http://esaku.id/'
            ],
            [
                'nama' => 'PT. Sagara Asia Teknologi',
                'no_telp' => '082274628295',
                'bidang' => 'Jasa TI dan Konsultan TI',
                'alamat' => 'Summercon, Gedebage',
                'email_perusahaan' => 'info@sagara.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Fery Fatturrohman',
                'kontak_pic' => '082274628295',
                'url' => 'http://www.sagara.asia/'
            ],
            [
                'nama' => 'PT. Sinar Baru Rajawali',
                'no_telp' => '086382739175',
                'bidang' => 'Telekomunikasi',
                'alamat' => 'Jl. Kecapi No. 20 Bandung',
                'email_perusahaan' => 'info@sbr.com',
                'foto_perusahaan' => '',
                'nama_pic' => 'Dilla Nur Sahila',
                'kontak_pic' => '086382739175',
                'url' => 'https://sbr.co.id/'
            ],
        ];

        foreach($perusahaans as $perusahaan){
            Perusahaan::create($perusahaan);
    }
    }
}
