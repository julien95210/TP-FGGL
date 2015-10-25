<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        App::uses('AppModel', 'Model');

        class Fighter extends AppModel {

                public $displayField = 'name';

                public $belongsTo = array(

                    'Player' => array(

                    'className' => 'Player',

                    'foreignKey' => 'player_id',                
        ),
   );    
                public function doMove($fighterId, $direction){
         //récupérer la position et fixer l'id de travail
        $datas = $this->read(null, $fighterId);

       //falre la modif
        if ($direction == 'north'){
        $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] + 1);}
        
        elseif ($direction == 'south'){
        $this->set('coordinate_y', $datas['Fighter']['coordinate_y'] - 1);
        }
        elseif ($direction == 'east'){
        $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] + 1);
        }
        elseif ($direction == 'west'){
        $this->set('coordinate_x', $datas['Fighter']['coordinate_x'] - 1);
        
        }
        else{
            return false;
        }
       //sauver la modif
        $this->save();
        return true;
    
    }
}

?>
    </body>
</html>
