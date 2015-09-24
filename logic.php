<?php 

	# check post for count value
	if(isset($_POST['count'])) {
		# save current post value into count variable #
		$count = $_POST['count'];

		if($count > 10) {
			print "Your word count was too high. It was changed to MAX!";
			$count = 10;
		} else {
			# check count if it is a number and print error #
			if(!is_numeric($count)) {
				print "Sorry, there is a problem with the number of words.";
			}

			# make sure count is not less than 1 #
			if($count < 1) {
				$count = 1;
			}
		}
	} 

	# check if dictonary file, and load #
	if($words = file('words.txt')) {

		# word array #
		$selected_words = [];

		# symbols arrays #
		$symbols = ["!", "@", "#", "$", "%", "&", "*"];

		# numbers array #
		$numbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];


		for($i = 0; $i < $count; $i++) {
			$max = count($words) - 1;
			$rand = rand(0, $max);
			$word = $words[$rand];

			array_push($selected_words, chop($word, "\n"));
		}

		# change first letters to uppercase #
		switch ($_POST['letters']) {
			case 1: // Last letters 
                          foreach($selected_words as $key => $value) {
                                $selected_words[$key] = strrev(ucfirst(strrev($selected_words[$key])));
                          }
			  break;

                        case 2: // All uppercase letters 
                          foreach($selected_words as $key => $value) {
                                print "\n" . $selected_words[$key];
                                $selected_words[$key] = strtoupper($selected_words[$key]);
                          }
                          break;

                        case 3: // All lowercase letters 
                          foreach($selected_words as $key => $value) {
                                print "\n" . $selected_words[$key];
                                $selected_words[$key] = strtolower($selected_words[$key]);
                          }
                          break;

                        case 4: // First letter 
                          foreach($selected_words as $key => $value) {
                                print "\n" . $selected_words[$key];
                                $selected_words[$key] = ucfirst($selected_words[$key]);
                          }
                          break;

			default:
			  break;
		}

		 
                switch ($_POST['symbols']) {
			case 1: // none
			  break;

			case 2: // first position
                          $max = sizeof($symbols) - 1;
                          $rand = rand(0, $max);
                          $selected_words[sizeof($selected_words) - 1] = $symbols[$rand] . $selected_words[sizeof($selected_words) - 1];
			  break;

                        case 3: // first position
                          $max = sizeof($symbols) - 1;
                          $rand = rand(0, $max);
                          $selected_words[sizeof($selected_words) - 1] = $selected_words[sizeof($selected_words) - 1] . $symbols[$rand];
                          break;

			default:
			  break;
		}


		// generate numbers for our password //
                switch ($_POST['numbers']) {
                        case 1: // none
                          break;

                        case 2: // first position
                          $max = sizeof($symbols) - 1;
                          $rand = rand(0, $max);
                          $selected_words[sizeof($selected_words) - 1] = $numbers[$rand] . $selected_words[sizeof($selected_words) - 1];
                          break;

                        case 3: // first position
                          $max = sizeof($symbols) - 1;
                          $rand = rand(0, $max);
                          $selected_words[sizeof($selected_words) - 1] = $selected_words[sizeof($selected_words) - 1] . $numbers[$rand];
                          break;

                        default:
                          break;
                }

		// combine array //
		$password = implode("", $selected_words);

	}
 
