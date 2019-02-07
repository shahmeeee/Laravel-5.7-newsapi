<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api;
use App\Source;


class ApiController extends Controller
{

    public function newsapi(Request $request)
    {

        $data['news_channel'] = $this->allSources();

        return view('welcome', $data);
    }

    public function allSources()
    {
        $api = new Api;
        $allSources = $api->getAllSources();

        return $allSources;
    }

    public function getNewsContent(Request $request)
    {
        if (($_SERVER["REQUEST_METHOD"] == "POST")) {

            $source = $_POST['source'];
            $split_input = explode(':', $source);
            $source = trim($split_input[0]);
            $data['source_name'] = $split_input[1];

        }

        $api = new Api;

        $param['channel'] = $source;
        $param['keyword'] = $_POST['keyword'];

        $data['news'] = $api->getAllNews($param);


        return view('content/newscontent', $data);
    }

    public function newsDataImport(Request $request)
    {

        $api = new Api;
        $allSources = $api->getAllSources();


        $input = $request->all();
        $type = $input['type'];

        if ($type == 1) {
            $source = new Source();

            $x=0;
            $data = [];
            if (!empty($allSources)) {
                foreach ($allSources as $item) {

                    $chkexist = Source::select('*')->where('sourceID',$item['id'])->first();
                    if(!$chkexist){
                        $data[$x]['sourceID'] = $item['id'];
                        $data[$x]['name'] = $item['name'];
                        $data[$x]['description'] = $item['description'];
                        $data[$x]['url'] = $item['url'];
                        $data[$x]['category'] = $item['category'];
                        $data[$x]['language'] = $item['language'];
                        $data[$x]['country'] = $item['country'];

                        $x++;
                    }


                }
            }

            if(!empty($data)){

                $allSources = Source::insert($data);
              var_dump($data);
            }
        }else{
            exit;
        }

    }

}
