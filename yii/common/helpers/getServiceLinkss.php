<?php
namespace common\helpers;
use yii\helpers\Url;
use backend\models\Service;

class getServiceLinkss
{

public static function getLinks()
	{
			$rows = Service::find()
            ->where(['service.status' => 1])
			->andWhere (['id_parent' => NULL])
            ->all();
			

		
	   foreach($rows as $rw){
  

                      echo '<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                            <div class="media">
                                                  
                                                       <div class="media-body text-left">
                                                              <h4 class="media-heading"><a href="';
															  echo Url::toRoute(['service/view', 'id' => $rw['id']]); 
															  echo '">'.$rw['stitle'] . '</a></h4>'; ?>

                                                               <?php
                                                                  $rowsin = Service::find()
                                                                  ->where(['service.status' => 1])
                                                                  ->andWhere (['id_parent' => $rw['id']])
                                                                  ->all();
                                                               echo '<ul class="servicenav">';
                                                               foreach($rowsin as $rwin){
															       
															       echo '<li><a href="';
																   echo Url::toRoute(['service/view', 'id' => $rwin['id']]); 
                                                                   echo '">'.$rwin['stitle']. '</a></li>';
                                                             } 
															    echo '</ul>';
                                                                ?>
                                    <?php echo'</div><br>
                                              </div>
                            </div>';

          }


      }



}



?>
