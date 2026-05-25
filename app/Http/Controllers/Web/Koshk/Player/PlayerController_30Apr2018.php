<?php

namespace Vanguard\Http\Controllers\Koshk\Player;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Controllers\Koshk\KoshkController;

//require ( '/home/koshkcomics/public_html/public/FB/Facebook/autoload.php' );

use Facebook\Facebook;

use Illuminate\Support\Facades\DB;

class PlayerController extends KoshkController
{
    //

    public function index(Request $request)
    {
    	echo 'entry             ';

    	dd($request);

		$fb = new Facebook([
		  'app_id' => '170161316509571',
		  'app_secret' => '92fcf6d4ac1dc115b01755afaacd4f9f',
		  'default_graph_version' => 'v2.2',
		  ]);

		echo 'created object';

		// $helper = $fb->getCanvasHelper();

		// try {
		//   $accessToken = $helper->getAccessToken();
		// } catch(Facebook\Exceptions\FacebookResponseException $e) {
		//   // When Graph returns an error
		//   echo 'Graph returned an error: ' . $e->getMessage();
		//   exit;
		// } catch(Facebook\Exceptions\FacebookSDKException $e) {
		//   // When validation fails or other local issues
		//   echo 'Facebook SDK returned an error: ' . $e->getMessage();
		//   exit;
		// }

		// if (! isset($accessToken)) {
		//   echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
		//   exit;
		// }

		// // Logged in
		// echo '<h3>Signed Request</h3>';
		// var_dump($helper->getSignedRequest());

		// echo '<h3>Access Token</h3>';
		// var_dump($accessToken->getValue());

    }

 	public function comicbook()
    {
    	$book = $this->getInput('id');

		if(!$this->missing_input)
		{
			$sql = 'SELECT card.id AS id, card.name AS name, card.description AS description, category.name AS catname, category.id AS catid , card.panels_status AS panels_status, category.description AS catdesc FROM `card`, `category` where category.id = card.category_id AND category.id ='. $book;
            
            $results = DB::select($sql, array(1));

            if (!$results) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            }

            $count=-1;

            foreach ($results as $row) {

                if($row->panels_status == '3')
                {
                    $count = $count+1;
                    $data[$count]['id'] = $row->id;
                    
                    $data[$count]['name'] = $row->name;
                    $data[$count]['description'] = $row->description;
                    $data[$count]['catdesc'] = $row->catdesc;
                    $data[$count]['catname'] = $row->catname;
                }
            }

            //dd($data);

            return view('koshk.player.comicbook', compact('data','book','count'));  

		}
    }
    
    public function story()
    {
    	$story = $this->getInput('id');
    	$book = $this->getInput('book');

		if(!$this->missing_input)
		{
			return view('koshk.player.story', compact('story','book'));  
		}
    }
       
}
