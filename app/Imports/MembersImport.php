<?php

namespace App\Imports;

use App\Models\Anggota;
use App\Models\Group;
use App\Models\Member;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

//class MembersImport implements ToCollection, WithHeadingRow
class MembersImport implements ToModel,WithStartRow,WithBatchInserts
{
    use RemembersRowNumber;

    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        $currentRowNumber = $this->getRowNumber();

        $group = Group::where('kota',$row[1])->first();
        $member = Member::find($row[0]);
        if (empty($member)){
            return new Member([
                'id'        => $row[0],
                'group_id'  => $group->id ?? null,
                'nama'      => $row[2],
                'alamat'    => $row[3],
                'hp'        => $row[4],
                'email'     => $row[5],
            ]);
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

//    public function collection(Collection $collection)
//    {
//
//        try{
//            DB::beginTransaction();
//            foreach ($collection as $row){
//                if(empty($row['kode_anggota']) || is_null($row['kode_anggota'])){
//                    break;
//                }
//                $tgl_lahir = ($row['tanggal_lahir'] - 25569) * 86400;
//                $anggota = Anggota::updateOrCreate(
//                    ['kode_anggota'=> $row['kode_anggota'], 'kode_koperasi'=> Auth::user()->kode_koperasi,'koperasi_id'=> Auth::user()->koperasi_id],
//
//                    ['nama_ktp' => $row['nama'],
//                        'nomor_ktp' => $row['nik'],
//                        'tempat_lahir' => $row['tempat_lahir'],
//                        'tgl_lahir' => gmdate("Y-m-d", $tgl_lahir),
//                        'alamat_ktp' => $row['alamat_ktp'],
//                        'alamat_desa_ktp' => $row['desa'],
//                        'alamat_kec_ktp' => $row['kecamatan'],
//                        'jenis_kelamin' => $row['jenis_kelamin'],
//                        'status_dlm_keluarga' => $row['status_dalam_keluarga'],
//                        'jml_anggota_keluarga' => $row['jumlah_anggota_keluarga'],
//                        'pendidikan_terakhir' => $row['pendidikan_terakhir'],
//                        'pekerjaan_lain' => $row['pekerjaan_lain'],
//                        'status_anggota' => $row['status_anggota'],
//                    ]);
//            }
//            DB::commit();
//        }catch (\Exception $exception){
//            Flash::error('Data Anggota failed to input:'.$exception->getMessage());
//            DB::rollBack();
//        }
//    }
}
