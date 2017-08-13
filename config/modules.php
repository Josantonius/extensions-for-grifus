<?php
/**
 * Extensions For Grifus WordPress plugin.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Josantonius/Extensions-For-Grifus.git
 * @since      1.0.0
 */

return [

    'module' => [
        'CopyMovieGrifus' => [
            'copy-movie-grifus' => [
                'copy-movie-grifus.php',
                'LICENSE',
                'composer.json',
                'config' => [
                    'add-urls.php',
                    'assets.php',
                    'namespaces.php',
                    'paths.php',
                    'set-hooks.php',
                ],
                'languages' => [
                    'extensions-for-grifus-copy-es_ES.mo',
                    'extensions-for-grifus-copy-es_ES.po',
                ],
                'public' => [
                    'css' => [
                        'copy-movie-grifus.css',
                    ],
                    'images' => [
                        'copy-movie-grifus.png',
                    ],
                    'js' => [
                        'copy-movie-grifus.js',
                        'eliasis-clipboard.min.js',
                    ],
                ],
                'src' => [
                    'Controller' => [
                        'Launcher' => [
                            'Launcher.php',
                        ],
                        'Front' => [
                            'Copy' => [
                                'Copy.php',
                            ],
                        ],
                    ],
                    'Model' => [
                        'Front' => [
                            'Copy' => [
                                'Copy.php',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'CustomRatingGrifus' => [
            'custom-rating-grifus' => [
                'custom-rating-grifus.php',
                'LICENSE',
                'composer.json',
                'config' => [
                    'add-urls.php',
                    'assets.php',
                    'menu.php',
                    'namespaces.php',
                    'pages.php',
                    'paths.php',
                    'set-hooks.php',
                ],
                'languages' => [
                    'extensions-for-grifus-rating-es_ES.mo',
                    'extensions-for-grifus-rating-es_ES.po',
                ],
                'public' => [
                    'css' => [
                        'custom-rating-grifus.css',
                        'custom-rating-grifus-admin.css',
                        'custom-rating-grifus-edit-post.css',
                    ],
                    'images' => [
                        'custom-rating-grifus.png',
                    ],
                    'js' => [
                        'custom-rating-grifus.js',
                        'custom-rating-grifus-admin.js',
                        'custom-rating-grifus-home.js',
                        'custom-rating-grifus-edit-post.js',
                        
                    ],
                ],
                'src' => [
                    'Controller' => [
                        'Launcher' => [
                            'Launcher.php',
                        ],
                        'Admin' => [
                            'Page' => [
                                'CustomRating' => [
                                    'CustomRating.php',
                                ],
                            ],
                            'Rating' => [
                                'Rating.php',
                            ],
                        ],
                    ],
                    'Model' => [
                        'Launcher' => [
                            'Launcher.php',
                        ],
                        'Admin' => [
                            'Rating' => [
                                'Rating.php',
                            ],
                        ],
                    ],
                    'template' => [
                        'meta-boxes' => [
                            'wp-insert-post.php',
                        ],
                        'page' => [
                            'custom-rating.php',
                        ],
                    ],
                ],
            ],
        ],
        'CustomImagesGrifus' => [
            'custom-images-grifus' => [
                'custom-images-grifus.php',
                'LICENSE',
                'composer.json',
                'config' => [
                    'add-urls.php',
                    'assets.php',
                    'menu.php',
                    'namespaces.php',
                    'pages.php',
                    'paths.php',
                    'set-hooks.php',
                ],
                'languages' => [
                    'extensions-for-grifus-images-es_ES.mo',
                    'extensions-for-grifus-images-es_ES.po',
                ],
                'public' => [
                    'css' => [
                        'custom-images-grifus-admin.css',
                    ],
                    'images' => [
                        'custom-images-grifus.png',
                    ],
                    'js' => [
                        'custom-images-grifus-admin.js',
                    ],
                ],
                'src' => [
                    'Controller' => [
                        'Launcher' => [
                            'Launcher.php',
                        ],
                        'Admin' => [
                            'Page' => [
                                'CustomImages' => [
                                    'CustomImages.php',
                                ],
                            ],
                            'Image' => [
                                'Image.php',
                            ],
                        ],
                    ],
                    'Model' => [
                        'Launcher' => [
                            'Launcher.php',
                        ],
                        'Admin' => [
                            'Image' => [
                                'Image.php',
                            ],
                        ],
                    ],
                    'template' => [
                        'page' => [
                            'custom-images.php',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
