<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            $configFile = Yii::app()->getRequest()->getParam('configFile');
            if(empty($configFile)) $configFile = "level2";
            $myfile = Yii::app()->file->set('./protected/data/'.$configFile.'.json', true);
            $config = json_decode($myfile->contents);
//            echo "<pre>";
//            print_r($config->sources);
//            echo "</pre>";
            $data = array();
            $types = array();
            foreach($config->sources as $sIndex => $source){
                foreach ($source->feeds as $index => $feed){
                    $types[$feed->type] = 1;
                    $data[$sIndex]['top'] = $source->position->top;
                    $data[$sIndex]['left'] = $source->position->left;
                    $data[$sIndex]['feeds'][] = array(
                        'type'=>$feed->type,
                        'symbol'=>$feed->symbol,
                        'color'=>$feed->color,
                        'response'=>json_decode($this->makeUrlCall($feed->feedID)),
                    );
                }
            }
            $this->render('index',array('data'=>$data,'types'=>$types));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
        
        private function makeUrlCall($feed){
            $url = "http://ioft.de/api/feed/".$feed;
            //Yii::log('', CLogger::LEVEL_ERROR, 'Calling: ' . $url);
            $result = file_get_contents($url);
            //Yii::log('', CLogger::LEVEL_ERROR, $result);
            return $result;
                    
        }        
}