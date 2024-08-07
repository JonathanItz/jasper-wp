<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'headerImage' => $this->getHeaderImage(),
            'siteName' => $this->siteName(),
        ];
    }

    public function getHeaderImage() {
        $imageData = get_field('header_image', 'options');
        if($imageData) {
            return $imageData;
        }

        return false;
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }
}
