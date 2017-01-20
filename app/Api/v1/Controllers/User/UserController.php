<?php
/**
 * Created by PhpStorm.
 * User: kqc
 * Date: 2017/1/19
 * Time: 16:00
 */

namespace App\Api\v1\Controllers\User;

use App\Api\v1\Controllers\CommonController;

class UserController extends CommonController
{
    /**
     * 用户登陆
     * @api {post} /user/login
     * @param
     */
    public function userLogin(){
        $rules = [
            'id' => 'required|max:600',
            'name' => 'required|max:600',
        ];
        $error = [
            'required' => ':attribute 不能为空',
            'max' => ':attribute 长度请限制在 200个字符 之内',
            'integer' => ':attribute 必须为整数',
        ];

        $this->valid(self::$request, $rules, $error);
        $this->success(self::$request->input('id'));
    }
}