<?php
class ReportsController extends AppController {
        
    var $name = 'Reports';
	// Stuff to make javascript work
    var $helpers = array('Html','Javascript','Ajax', 'Crumb');
    var $uses = NULL;// No model for this controller
	// Setting the limit for paginator
    var $paginate = array('limit' => 25);
    var $reports = array('VF-report','MoH-report');
    
    function download(){
	$path='../vendors/reports/';
        if(!empty($this->data)) {
	    chdir($path);
	    $filename=$this->reports[$this->data['Reports']];
	    
	    //$out=system('pwd');
	    shell_exec('cd '.$path);
	    
	    #debug();
	    shell_exec('python '.$filename.'.py');
	    //your file to upload
	    $fullPath ='output/'.$filename.'.pdf';
	    $content = fopen ($fullPath,'r'); 



	  if ($fd = fopen ($fullPath, "r")) {
	      $fsize = filesize($fullPath);
	      $path_parts = pathinfo($fullPath);
	      $ext = strtolower($path_parts["extension"]);
	      switch ($ext) {
	      case "pdf":
		
		header("Content-type: application/pdf"); // add here more headers for diff. extensions
		header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
		 // use 'attachment' to force a download
		break;
		default;
		header("Content-type: application/octet-stream");
		header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
	      }
	      header("Content-length: $fsize");
	      header("Cache-control: private"); //use this to open files directly
	      while(!feof($fd)) {
		$buffer = fread($fd, 2048);
		echo $buffer;
	      }
	  }
	  fclose ($fd);
	  header('Location: '.$this->webroot);
	  exit;
	  
	  

     
	}
	else{
	    $this->set('reports',$this->reports);
	}
    }
  
	
}