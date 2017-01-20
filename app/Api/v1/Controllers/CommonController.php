<?php
/**
 *  基础控制器
 */
namespace App\Api\v1\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller;
use Mockery\Exception;

class CommonController extends Controller {

    /**
     * 接口状态码
     */
    const RETURN_CODE = 'code';
    /**
     * 接口提示信息
     */
    const RETURN_MESG = 'message';
    /**
     * 接口数据
     */
    const RETURN_DATA = 'data';
    /**
     * 返回错误信息
     */
    private static $error = [
        self::RETURN_CODE => '1',
        self::RETURN_MESG => ''
    ];
    /**
     * 接口返回数据格式
     */
    private static $result = [
        self::RETURN_CODE => 0,
        self::RETURN_MESG => 'ok',
        self::RETURN_DATA => []
    ];
    /**
     * Http请求
     */
    public static $request = null;

    /**
     *
     */

    public function __construct(Request $request){
        self::$request = $request;
    }
    /**
     * 数据验证
     * @param $request, $rules = [], $error = []
     * @return
     */
    final protected function valid($request, $rules = [], $error = []){
        try{
            $this->validate($request, $rules, $error);
        }catch (ValidationException $e){
            dd($e->validator->errors()->first());
        }
    }
    /**
     * 返回错误信息
     * @
     */
    protected function error($mesg = ''){
        self::$error[self::RETURN_MESG] = (String)$mesg;
        return self::$error;
    }

    /**
     * 返回接口结果
     * @param array $data
     * @return array
     */
    protected function success($data = []){
        self::$result[self::RETURN_DATA] = (array)$data;
        return self::$result;
    }

}