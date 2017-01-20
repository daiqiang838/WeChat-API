<?php
/**
 * Created by PhpStorm.
 * User: kqc
 * Date: 2017/1/19
 * Time: 16:00
 */

namespace App\Api\v1\Controllers\User;

use App\Api\v1\Controllers\CommonController;
use Illuminate\Support\Facades\Validator;
class UserController extends CommonController
{
    /**
     * 用户登陆
     * @api {post} /user/login
     * @param
     */
    public function userLogin(){

        $data = self::$request->only([
            'admin_id',
            'role'
        ]);
        $rules = [
            'admin_id' => 'required',
            'role' => 'required',
        ];
        $errors = [
            'required' => ':attribute 必须输入',
        ];
        $validator = Validator::make($data, $rules, $errors);
        if ($validator->fails()) {
            return $this->returnData(1, current(current($validator->errors()->toArray())));
        }





    }
}