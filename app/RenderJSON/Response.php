<?php

namespace App\RenderJSON;

class Response
{
  public static function renderJSON($response, $value) {
    switch ($response) {
      case true:
        $success = true;
        $message = 'success';
        $data = $value;
      break;
      case false:
        $success = false;
        $message = 'error';
        $data = [
          'error_messages' => $value
        ];
      break;
    }

    return response()->json([
      'success' => $success,
      'message' => $message,
      'data' => $data
    ]);
  }
}
