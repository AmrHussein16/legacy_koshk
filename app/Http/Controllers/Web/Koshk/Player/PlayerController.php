<?php

namespace Vanguard\Http\Controllers\Web\Koshk\Player;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Facebook\Facebook;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{

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

    public function comicbook(Request $request)
    {
        $book = $request->id;

        $sql = 'SELECT card.id AS id, card.name AS name, card.description AS description, category.name AS catname, category.id AS catid , card.panels_status AS panels_status, category.description AS catdesc FROM `card`, `category` where card.price = 0 AND category.id = card.category_id AND category.id =' . $book;

        $results = DB::select($sql);

        $count = -1;

        foreach ($results as $row) {
            if ($row->panels_status == '3') {
                $count = $count + 1;
                $data[$count]['id'] = $row->id;

                $data[$count]['name'] = $row->name;
                $data[$count]['description'] = $row->description;
                $data[$count]['catdesc'] = $row->catdesc;
                $data[$count]['catname'] = $row->catname;
            }
        }

        return view('front.comicbooks.comicbook', compact('data', 'book', 'count'));
    }

    public function story(Request $request)
    {
        $story = $request->input('id');
        $book = $request->input('book');

        $sql2    = 'SELECT lang, lang_title FROM `card`, `languages_data` where `card`.lang = `languages_data`.lang_id AND category_id  = ' . $book . ' AND id = ' . $story;

        $result2 = DB::select($sql2);

        if (!$result2) {
            echo "DB Error, could not query the database\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }

        $languages[$result2[0]->lang] = $result2[0]->lang_title;

        //$languages = [];
        $story_lang = $result2[0]->lang;

        $sql1    = 'SELECT category_id, card_id, lang, panel_index, subtitle, lang_title  FROM `subtitles`, `languages_data` where `subtitles`.lang = `languages_data`.lang_id AND category_id  = ' . $book . ' AND card_id = ' . $story . ' ORDER BY panel_index ASC';

        $result1 = DB::select($sql1);

        if (!$result1) {
            // No translations for this episode
            // echo "DB Error, could not query the database\n";
            //echo 'MySQL Error: ' . mysql_error();
            // exit;
            $translations = [];
        }



        foreach ($result1 as $row) {
            $translations[$row->lang][$row->panel_index] = $row->subtitle;
            if (!in_array($row->lang, $languages))
                $languages[$row->lang] = $row->lang_title;
        }

        //echo count($translations,COUNT_NORMAL) . '  recursive: ' . count($translations,COUNT_RECURSIVE);

       // dd($translations);

	//if (!$this->missing_input) {
		//return view('koshk.player.story', compact('story', 'book', 'languages', 'story_lang'));
            return view('koshk.player.story', compact('story', 'book', 'translations', 'languages', 'story_lang'));
       // }
    }
}
