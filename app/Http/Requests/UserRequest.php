<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = strtolower($this->method());
        $user_id = $this->route()->user;

        $rules = [];
        switch ($method) {
            case 'post':
                $rules = [
                    'username' => 'required|max:20',
                    'password' => 'required|confirmed|min:8',
                    'email' => 'required|max:191|email|unique:users',
                    'phone_number'=>'max:13',
                    // 'userProfile.gender' =>  'required',
                    'userProfile.country' =>  'max:191',
                    'userProfile.state' =>  'max:191',
                    'userProfile.city' =>  'max:191',
                    'userProfile.pin_code' =>  'max:191',
                ];
                break;
            case 'patch':
                if(auth()->user()->role == "Admin"){
                    $rules = [
                        'username' => 'required|max:30',
                        'email' => 'required|max:191|email|unique:users,email,'.$user_id,
                        'nama_lengkap'=>'required|max:100',
                        'password' => 'confirmed|min:8|nullable',
                        'jabatan' => 'required',
                        'foto_profile' => 'file|mimes:png,jpg|nullable|max:2048',
                    ];
                }else if(auth()->user()->role == "Perusahaan"){

                }else if(auth()->user()->role == "Alumni"){
                    $rules = [
                        'username' => 'required|max:30',
                        'email' => 'required|max:191|email|unique:users,email,'.$user_id,
                        'password' => 'confirmed|min:8|nullable',
                        'nama'=>'required|max:100',
                        'status' => 'required',
                        'no_telp' => 'required',
                        'tanggal_lahir' => 'required',
                        'angkatan' => 'required',
                        'id_jurusan' => 'required',
                        'alamat' => 'required',
                        'tentang' => 'required',
                        'foto_profile' => 'file|mimes:png,jpg|nullable|max:2048',
                        'resume' => 'file|mimes:docx,doc,pdf|nullable|max:4096',
                        // Pengalaman
                        'pengalaman_id.*' => 'nullable',
                        'judul.*' => 'required',
                        'perusahaan.*' => 'required',
                        'dari_tahun.*' => 'required',
                        'ke_tahun.*' => 'required',
                        // Edukasi
                        'edukasi_id.*' => 'nullable',
                        'nama_lembaga.*' => 'required',
                        'bidang.*' => 'required',
                        'tahun.*' => 'required',
                    ];
                }
                break;

        }

        return $rules;
    }

    public function messages()
    {
        return [
            'username.required'  =>'Username Harus Diisi',
            'email.required'  =>'Email Harus Diisi',
            'email.unique'  =>'Email Sudah Terpakai',
            'nama_lengkap.required'  =>'Nama Harus Diisi',
            'password.required'  =>'Password Harus Diisi',
            'password.confirmed'  =>'Password Tidak Sesuai Dengan Confirm Password',
            'password.min'  =>'Password Minimal Harus Memiliki 8 Karakter',
            'jabatan.required'  =>'Jabatan Harus Diisi',
            'status.required'  =>'Status Harus Diisi',
            'tanggal_lahir.required'  =>'Tanggal Lahir Harus Diisi',
            'angkatan.required'  =>'Angkatan Harus Diisi',
            'id_jurusan.required'  =>'Jurusan Harus Terpilih',
            'alamat.required'  =>'Alamat Harus Diisi',
            'tentang.required'  =>'Tentang Harus Diisi',
            'judul.required'  =>'Judul Harus Diisi',
            'perusahaan.required'  =>'Perusahaan Harus Diisi',
            'ke_tahun.required'  =>'Ke Tahun Harus Diisi',
            'dari_tahun.required'  =>'Dari Tahun Harus Diisi',
            'nama_lembaga.required'  =>'Nama Lembaga Harus Diisi',
            'bidang.required'  =>'Bidang Harus Diisi',
            'tahun.required'  =>'Tahun Lulus Harus Diisi',
        ];
    }

     /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator){
        $data = [
            'status' => true,
            'message' => $validator->errors()->first(),
            'all_message' =>  $validator->errors()
        ];
        if ($this->ajax()) {
            throw new HttpResponseException(response()->json($data,422));
        } else {
            throw new HttpResponseException(redirect()->back()->withInput()->with('errors', $validator->errors()));
        }
    }


}
