<?php

namespace Minulhasanrokan\CustomerSocialFinder;

class SocialFinder
{
    public function search($name, $profession, $company, $location)
    {
        $query = urlencode("$name $profession $company $location site:linkedin.com OR site:facebook.com OR site:twitter.com");
        return "https://www.google.com/search?q=$query";
    }
}