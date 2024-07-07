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
        $entries = $this->client->getEntries($query);

        if (!$entries) {
            abort(404);
        }
        $article=$entries[0];

        return view('blog.article', [
            'article' => $article
        ]);
    }
}
