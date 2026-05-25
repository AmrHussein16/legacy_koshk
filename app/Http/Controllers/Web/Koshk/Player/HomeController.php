<?php

namespace Vanguard\Http\Controllers\Web\Koshk\Player;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Vanguard\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * UsersController constructor.
     * @param UserRepository $users
     */
    public function __construct()
    {
        //echo 'saba7 el foll';
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //echo 'saba7 el manga!';

        // FIXME: This is a static data for now.
        $story = 7;
        $book = 11;

        $sql = 'SELECT card.id AS id, card.name AS name, card.description AS description, category.name AS catname, category.id AS catid , card.panels_status AS panels_status FROM `card`, `category` where category.id = card.category_id AND category.id =' . $book . ' and card.id =' . $story;

        $results = DB::select($sql);
        // $results = [];

        $count = -1;

        foreach ($results as $row) {

            if ($row->panels_status == '3') {
                $count = $count + 1;
                $today[$count]['id'] = $row->id;

                $today[$count]['name'] = $row->name;
                $today[$count]['description'] = $row->description;
                $today[$count]['catname'] = $row->catname;
            }
        }

        // =================================

        $comicbook_ids = array(136, 135, 127, 126, 125, 124, 123, 121, 118, 116, 115, 114, 113, 112, 109, 98, 96, 76, 11, 1);

        $bookslist_string = "(";

        foreach ($comicbook_ids as $onebook) {
            $bookslist_string = $bookslist_string . $onebook . ',';
        }
        $bookslist_string = substr($bookslist_string, 0, -1);
        $bookslist_string = $bookslist_string . ')';

        //dd($bookslist);

        $sql4    = 'SELECT id, name, description FROM `category` where id in' . $bookslist_string;
        $result4 = DB::select($sql4);
        // $result4 = [];

        $sql3    = 'SELECT * FROM `card` where category_id in' . $bookslist_string;

        $result3 = DB::select($sql3);
        // $result3 = [];

        $count2 = -1;
        foreach ($result3 as $row) {

            if ($row->panels_status == '3') {
                $count2 = $count2 + 1;
                $data[$count2]['id'] = $row->id;
                $data[$count2]['name'] = $row->name;
                $data[$count2]['description'] = $row->description;
                $data[$count2]['category_id'] = $row->category_id;
            }
        }

        return view('front.player.home', compact('today', 'story', 'book', 'data'));
    }
}
