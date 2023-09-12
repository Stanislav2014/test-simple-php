<?php
require __DIR__.'/../vendor/autoload.php';

use App\Http\Controllers\IndexController;
use App\Http\Responses\Response;
use App\Http\Requests\Request;

$requestData = Request::getRequest();
$data = (new IndexController())->getInfo($requestData);
Response::sendResponse($data);
return;







