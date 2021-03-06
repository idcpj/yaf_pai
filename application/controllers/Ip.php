<?php
    
    class IpController extends BaseController {
        public function getAction(){
            $ip = Common_Request::getRequest('ip',0);
            if (!$ip || filter_var('ip',FILTER_VALIDATE_IP)){
                $this->send(-4002,"ip 参数错误");
            }
            $model = new IpModel();
            $res = $model->get(trim($ip));
            if (!$res){
                $this->send($model->errno,$model->errmsg);
            }

            $this->send(0,'',$res);

        }
    }
