<?php 
	require_once('../../../config/config.php');
	//api_key
	$apikey='a2df3d1a7611194432bbdf1fc80540f2';
	//get movie time
	$starttime = $_POST['starttime'];//get movie start time
	$endtime = $_POST['endtime'];//get movie end time

	//get movie site
	$url = 'https://api.themoviedb.org/3/discover/movie?api_key='.$apikey.'&primary_release_date.gte='.$starttime.'&primary_release_date.lte='.$endtime;

	//get movie json data
	$json_film_date = file_get_contents($url);

	if(!$json_film_date){
		ajaxReturn(0,'error');
	}

	//decode movie json data
	$data = json_decode($json_film_date,true);
	//save in database
	foreach($data['results'] as $val) {

		    if(empty($val['backdrop_path'])){
		    		$img = 'http://temp.im/500x281';
		    }else{
		   	 	$img = 'https://image.tmdb.org/t/p/w500/'.$val['backdrop_path'];
		    }

		    $level = array('G','PG','PG13','R','NC17');
		    $city = array('New York','Los Angeles','Chicago','Houston','philadelphia','PHONEIX','San Diego','Dallas','Detroit','San Jose','San Francisco');
		    $director = array('Steven Spielberg','James Cameron','George Lucas','Michael Bay','Clint Eastwood');
		    $actor =  array('Tom Hanks','Emma Watson','Chris Evans','Cate Blanchett','Angelina Jolie');
		    $cinema = array('ACM LA','ACM NY','ACM San Francisco','ACM Seattle','ACM Houston');
			$data2 = array(
				'original_title'=>$val['original_title'],
				'film_id'=>$val['id'],
				'backdrop_path'=>$img,
				'level'=>$level[array_rand($level)],
				'city'=>$city[array_rand($city)],
				'director'=>$director[array_rand($director)],
				'actor'=>$actor[array_rand($actor)],
				'cinema'=>$cinema[array_rand($cinema)],
				'vote_average'=>$val['vote_average'],
				'release_date'=>$val['release_date'],
				'addtime'=>date('Y-m-d H:i:s'),
			);

			insert($link,$data2,'movies');
	}
		

	ajaxReturn(1,'success');

