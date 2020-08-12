<?php
$request = new HttpRequest();
$request->setUrl('https://api.uptimerobot.com/v2/getMonitors');
$request->setMethod(HTTP_METH_POST);
          
$request->setHeaders(array(
  'cache-control' => 'no-cache',
  'content-type' => 'application/x-www-form-urlencoded'
));
          
$request->setContentType('application/x-www-form-urlencoded');
$request->setPostFields(array(
  'api_key' => 'u998686-5d198f158c198a01a6148170',
  'format' => 'json',
  'logs' => '1'
));
          
try {
  $response = $request->send();
          
  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
    }

?>