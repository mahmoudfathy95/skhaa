<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 14/01/18
 * Time: 09:25 م
 */

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Http\ResponseFactory;

class ApiResponse
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var ResponseFactory
     */
    protected $response;

    /**
     * @var array
     */
    protected $body;


    public function __construct(ResponseFactory $response)
    {
        $this->response = $response;
        //$this->initialize();
    }



    /**
     * Set response data.
     *
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->body['data'] = $data;
        return $this;
    }


    public function setError($error)
    {
        $this->body['status'] = 'error';
        $this->body['message'] = $error;
        return $this;
    }
    public function setSuccess($message)
    {
        $this->body['status'] = 'success';
        $this->body['message'] = $message;
        return $this;
    }
    public function setCode($code)
    {
        $this->body['code'] = $code;
        return $this;
    }


    public function send()
    {
        return $this->response->json($this->body);
    }

    private  function initialize()
    {
        $body = [
            'data' => [],
        ];

        $this->body = $body;
    }





}