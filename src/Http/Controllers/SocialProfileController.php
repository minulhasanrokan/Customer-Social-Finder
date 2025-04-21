<?php

namespace Minulhasanrokan\CustomerSocialFinder\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class SocialProfileController extends Controller
{
    public function index(Request $request)
    {
        $results = [];

        if ($request->isMethod('POST') && $request->filled('name')) {
            $query = implode(' ', array_filter([
                $request->input('name'),
                $request->input('profession'),
                $request->input('company'),
                $request->input('location'),
                'site:linkedin.com OR site:facebook.com OR site:twitter.com'
            ]));

            $response = Http::get("https://www.googleapis.com/customsearch/v1", [
                'key' => config('services.google.key'),
                'cx' => config('services.google.cx'),
                'q' => $query,
            ]);

            $data = $response->json();

            if (isset($data['items'])) {
                
                foreach ($data['items'] as $item) {
                    $thumbnail = null;

                    if (isset($item['pagemap']['cse_thumbnail'][0]['src'])) {
                        $thumbnail = $item['pagemap']['cse_thumbnail'][0]['src'];
                    }

                    $results[] = [
                        'title' => $item['title'] ?? '',
                        'link' => $item['link'] ?? '',
                        'snippet' => $item['snippet'] ?? '',
                        'image' => $thumbnail,
                    ];
                }
            }
            else {
                logger()->warning('No items found in Google Search response.', $data);
            }
        }

        return view('customer-social-finder::form', compact('results'));
    }
}
