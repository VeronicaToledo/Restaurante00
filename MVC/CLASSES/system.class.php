<?php

	class System{
		public function __construct($view){
			if (file_exists("mvc/views/{$view}.php")) {
				$file =$view;
			}else{
				$file ='404';
			}
			
			$this->get_header();

			use('mvc/views/'.$file.'.php');

			$this->get_footer();
		}
		private function get_header(){
			use('mvc/common/header.php');
		}

		private function get_footer(){
			use('mvc/common/footer.php');
		}
	}