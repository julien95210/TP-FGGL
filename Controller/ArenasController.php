<?php 

App::uses('AppController', 'Controller');

/**
 * Main controller of our small application
 *
 * @author ...
 */
class ArenasController extends AppController
{
    public $uses = array('Player', 'Fighter', 'Event');
    
    
    /**
     * index method : first page
     *
     * @return void
     */
    public function index()
    {
      $this->set('myname', "Julien Ferry");  
    }

    public function fighter() {
        $this->set('raw',$this->Fighter->findById(1));
        $this->Fighter->doMove(1, $this->request->data['Fightermove']['direction']);
        
        
    }
    
    public function diary() {
        $this->set('raw',$this->Event->find());
	}
        
    public function login() {

	}
    public function sight() {
        if ($this->request->is('post')) {            
        pr($this->request->data);       
        }
        $this->set('raw',$this->Fighter->find('all'));
	}
        
    
    }

?>