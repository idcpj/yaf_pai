<?php
    
    class MailController extends BaseController {
        public function indexAction(){
            
        }

        public function sendAction(){
            $this->_isSubmit();
            $uid = Common_Request::postRequest('uid',false);
            $title = Common_Request::postRequest('title',false);
            $contents = Common_Request::postRequest('contents',false);
            if ( ! $uid || ! $title || ! $contents) {
                $this->send(-3002,'用户 id, 邮件标题,邮件内容不能为空');
            }

            $model = new MailModel();
            if (!$model->send(intval($uid),$title,$contents)) {
                $this->send($model->errno,$model->errmsg);
            }
            $this->send();
        }
    }
