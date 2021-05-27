<?php 

	/**
	 * Format
	 */
	class Format{
		
		// Format date
		public function formatDate($date){
			return date('F j, Y, g:i a', strtotime($date));
		}

		// Readmore 
		public function textShorten($text, $limit = 400){
			$text = $text . ' ';
			$text = substr($text, 0, $limit);
			$text = substr($text, 0, strrpos($text, ' '));
			$text = $text . '.....';
			return $text;
		}

		// Validation
		public function validation($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		// Page title 

		public function title(){

			$path    = $_SERVER['SCRIPT_FILENAME'];
			$path    = explode('/', $path);
			$newPath = end($path);
			$newPath = explode('.', $newPath);
			$title   = $newPath[0];

			if ($title == 'index') {
				$title = 'home';
			}elseif ($title=='contact') {
				$title = 'contact';
			}else{
				$title = 'Hass Asraf';
			}

			return ucfirst($title);

		}
		
	}