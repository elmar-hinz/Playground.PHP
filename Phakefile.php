<?php

require_once("vendor/autoload.php");

task('default', 'list');

desc('List all tasks.');
task('list', function($application){
        $task_list = $application->get_task_list();
        if (count($task_list)) {
                $max = max(array_map('strlen', array_keys($task_list)));
                foreach ($task_list as $name => $desc) {
                        if($name != 'default')
                                echo str_pad($name, $max + 4) . $desc . "\n";
                }
        }
});

group('test', function() {
	desc('Unit tests');
	task('unit', function() {
		passthru('./vendor/bin/phpunit ./Tests/Unit/');
	});
	desc('--testdox');
	task('dox', function() {
		passthru('./vendor/bin/phpunit --testdox ./Tests/Unit/');
	});
});
