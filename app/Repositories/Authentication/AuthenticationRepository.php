<?php
namespace App\Repositories\Authentication;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class AuthenticationRepository extends BaseRepository implements AuthenticationRepositoryInterface
{
   

    public function loginRequestProcess($data)
    {
        $credentials = [
            'email' => $data->email,
            'password' => $data->password,
        ];

        if (!$token = auth()->attempt($credentials)) {
            return false;
        }
      
        return $this->createNewToken($token);
    }

    public function logoutProcess($request)
    {
       try {
            return auth()->logout();
       } catch (\Throwable $th) {
           return false;
       }
    }

    public function registerUser($data)
    {
        try {
            $data = [
                'name' => $data->input_name,
                'email' => $data->email,
                'password' => bcrypt($data->input_password),
            ];
            return $this->insertData($data);
        } catch (\Throwable $th) {
            return false;
        }
    }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
