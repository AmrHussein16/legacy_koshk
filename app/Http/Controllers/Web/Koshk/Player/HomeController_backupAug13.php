<?php

namespace Vanguard\Http\Controllers\Koshk\Player;

use Illuminate\Http\Request;
use App\Http\Requests ;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use Vanguard\User;

use Vanguard\Http\Controllers\Controller;
use Vanguard\Http\Controllers\Koshk\KoshkController;

use Illuminate\Support\Facades\DB;

class HomeController extends KoshkController
{

    public function index()
    {
    	
    	$story = $this->getInput("id");
    	$fname = $this->getInput('fname');
    	$lname = $this->getInput('lname');
    	$fid = $this->getInput('fid');
    	$book = $this->getInput('book');

		if(!$this->missing_input)
		{

    		//$book = 11;
    		//$story = 6;

            // $sql    = 'SELECT * FROM `card`, 'category' where category_id ='. $book .' and id ='. $story;
            $sql = 'SELECT card.id AS id, card.name AS name, card.description AS description, category.name AS catname, category.id AS catid , card.panels_status AS panels_status FROM `card`, `category` where category.id = card.category_id AND category.id ='. $book .' and card.id ='. $story;


            $results = DB::select($sql, array(1));

            if (!$results) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            } else
            {
            	//dd($results);

				$count=-1;
            	
            	foreach ($results as $row) {
            	
	                if($row->panels_status == '3')
	                {
	                    $count = $count+1;
	                    $today[$count]['id'] = $row->id;
	                    
	                    $today[$count]['name'] = $row->name;
	                    $today[$count]['description'] = $row->description;
	                    $today[$count]['catname'] = $row->catname;
	                }
            	}
            }
            

            $sql2 = 'SELECT card.id AS cardid, card.name AS cardname, card.description AS carddesc, category.id AS catid, category.name AS catname, category.description AS catdesc, featured_comics.highlight AS highlight FROM `featured_comics`, `card`, `category` WHERE featured_comics.episode_id = card.id && card.category_id = category.id && category.id = featured_comics.comic_id';

            $results2 = DB::select($sql2, array(1));

            if (!$results2) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            } else
            {

            	//dd($results2);

            	$fav_count=-1;
	            foreach ($results2 as $row) {
	                $fav_count = $fav_count+1;
	                $fav[$fav_count]['cardid'] = $row->cardid;
	                $fav[$fav_count]['cardname'] = $row->cardname;
	                $fav[$fav_count]['carddesc'] = $row->carddesc;

	                $fav[$fav_count]['catid'] = $row->catid;
	                $fav[$fav_count]['catname'] = $row->catname;
	                $fav[$fav_count]['catdesc'] = $row->catdesc;

	                $fav[$fav_count]['highlight'] = $row->highlight;
	                
	            }
            }

            // =================================


            $sql3    = 'SELECT * FROM `card` where category_id = 11 ORDER BY card.id  DESC';
            $result3 = DB::select($sql3, array(1));

            if (!$result3) {
                echo "DB Error, could not query the database\n";
                echo 'MySQL Error: ' . mysql_error();
                exit;
            } else {
            
		        $count2=-1;
		        foreach ($result3 as $row) {

		            if($row->panels_status == '3')
		            {
		                $count2 = $count2+1;
		                $data[$count2]['id'] = $row->id;
		                
		                // echo 'count =' .$count;
		                //echo '   ';
		                //echo $data[$count]['id'];
		                
		                $data[$count2]['name'] = $row->name;
		                $data[$count2]['description'] = $row->description;
		            }
		        }

			}

			return view('koshk.player.home', compact('today', 'story', 'fname', 'lname', 'fid', 'book', 'fav', 'fav_count','data', 'count2'));  
		}
    }

}
