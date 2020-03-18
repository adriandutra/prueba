<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Response;

class ModelResponse extends ApiResponse {
    private $_success = "";
    private $_message = "";
    private $_data = "";
    private $_draw = "";
    private $_recordsTotal = "";
    private $_recordsFiltered = "";
    public function __get($property) {
        return (isset($this->{'_' . $property}) ? $this->{'_' . $property} : null);
    }
    public function __set($property, $value) {
        if (isset($this->{'_' . $property})) {
            $this->{'_' . $property} = $value;
        }
    }
    public function __isset($property) {
        return isset($this->{'_' . $property});
    }
    public function doResponse() {
        if (isset($this->_data) && !empty($this->_data)) {
            return Response::json(array(
                'draw' => $this->_draw,
                'recordsTotal' => $this->_recordsTotal,
                'recordsFiltered' => $this->_recordsFiltered,
                'success' => $this->_success,
                'message' => $this->_message,
                'data' => $this->_data,
            ), 200
                );
        } else {
            return Response::json(array(
                'success' => $this->_success,
                'message' => $this->_message,
            ), 200
                );
        }
    }
    public function doError($message) {
        $this->success = false;
        $this->message = $message;
        return $this->doResponse();
    }
}
?>