<?php

namespace App\Services;

use Symfony\Component\String\Slugger\AsciiSlugger;

class Slugify
{
    public function generateSlug(string $texte): string
    {
        // $texte = 'slugged';
        // return $texte;
        $slugger = new AsciiSlugger();
        return $slugger->slug($texte);
    }
}
