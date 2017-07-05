<?php
namespace common\helpers;
use yii\helpers\Url;
use backend\models\Service;

class getServiceLinks
{

public static function getLinks()
	{
			$rows = Service::find()
            ->where(['service.status' => 1])
			->andWhere (['id_parent' => NULL])
            ->all();
			

		
	   foreach($rows as $rw){
  

                       echo '<div class="col-sm-6">
                                              <div class="media">
                                                  <div class="media-left">
                                                              <i class="fa fa-check"></i>
                                                       </div>
                                                       <div class="media-body text-left">
                                                              <h4 class="media-heading"><a href="';
															  echo Url::toRoute(['service/view', 'id' => $rw['id']]); 
															  echo '">'.$rw['stitle'] . '</a></h4>'; ?>

                                                               <?php
                                                                  $rowsin = Service::find()
                                                                  ->where(['service.status' => 1])
                                                                  ->andWhere (['id_parent' => $rw['id']])
                                                                  ->all();

                                                               foreach($rowsin as $rwin){
															       echo '<a href="';
																   echo Url::toRoute(['service/view', 'id' => $rwin['id']]); 
                                                                   echo '">'.$rwin['stitle']. '</a>&ensp;';
                                                             } ?>

                      <?php echo'</div><br>
                                              </div>
                                      </div>';

          }


      }



}



?>
