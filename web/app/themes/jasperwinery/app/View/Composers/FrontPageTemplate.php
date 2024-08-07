<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FrontPageTemplate extends Composer
{
    public function __construct() {
        $this->getFeaturedImage();
        $this->getHeroText();
    }

    /**
     * List of views served by this composer.
     *
     * @var string[]
     */
    protected static $views = [
        'template-front-page'
    ];

    /**
     * This will make the variable `$roots` available in the 'example' partial
     * with the value described here.
     */
    public function with()
    {
        return [
            'image' => $this->image,
            'heading' => $this->heading,
            'description' => $this->description,
            'link' => $this->link,
        ];
    }


    public string $image;

    public function getFeaturedImage() {
        $this->image = get_the_post_thumbnail(attr: ['class' => 'max-w-screen max-h-screen object-cover object-top objec']);
    }

    public string $heading = '';
    public string $description = '';
    public array $link = [];

    public function getHeroText() {
        $this->heading = get_field('page_heading');
        $this->description = get_field('hero_description');
        $this->link = get_field('link');
    }
}
