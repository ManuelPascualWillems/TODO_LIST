<?php
  return [
    'settings' => [
      'displayErrorDetails' => true,
      'render' => [
        'template_path' => __DIR__.'/../templates/',
      ],
			'db' => [
	            'database_type' => 'mysql',
	            'database_name' => 'todo_list',
	            'server' => 'localhost:8889',
	            'username' => 'root',
	            'password' => 'root',
	            'charset' => 'utf8'
	        ],
    ]
  ];
