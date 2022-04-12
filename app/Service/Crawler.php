<?php

namespace App\Service;



class Crawler
{
    public function dom_template()
    {
        return [
            'loop_item' => ['dom' =>'.card'],
            'image' => [
                'dom' =>'.card-img-top.overlay.overlay1.hover-scale a img',
                'type' => 'src'
            ],
            'title' => [
                'dom' =>'.post-title.h3.mt-1.mb-3 a',
                'type' => 'plaintext'
            ],
            'description' => [
                'dom' => '.post-content p',
                'type' => 'plaintext'
            ],
            'description' => [
                'dom' => '.post-content p',
                'type' => 'plaintext'
            ],
            'comment_count' => [
                'dom' => '.post-comments',
                'type' => 'plaintext'
            ]
        ];
    }
}
