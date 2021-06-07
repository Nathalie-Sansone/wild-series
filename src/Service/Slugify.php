<?php


namespace App\Service;


class Slugify
{
    public function generate(string $input): string
    {
        $search = explode(",","ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u");
        $replace = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u");
        $input = str_replace($search, $replace, $input);

        $input = strtolower($input);
        $input = trim($input);
        $input = preg_replace("/[^a-z0-9]/", "-", $input);
        $input = preg_replace("/[\-]+/", '-', $input);
        return $input;
    }
}

