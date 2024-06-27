<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;

class ArticleController extends Controller
{
    /**
     * @var DeliveryClient
     */
    private $client;

    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }

    public function index() {
        $query= new Query;
        $query->setContentType('blogPost');
        $entries = $this->client->getEntries($query);
//        dd($entries);
        return view('blog.index', [
            'articles'=>$entries
        ]);
    }
    public function show(string $slug)
    {
        $query= new Query;
        $query->setContentType('blogPost')->where("fields.postSlug",$slug);
        $entry = $this->client->getEntries($query);

        if (!$entry) {
            abort(404);
        }

        dd($entry);

//        return view('blog.article', [
//            '' => $entry
//        ]);
    }
}
