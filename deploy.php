<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'WEB701-practice');

// Project repository
set('repository', 'https://github.com/hiroshishu/WEB701-practice.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);


// Hosts

host('practice')
    ->hostname('newsimland.com')
    ->user('Hao-Zhu')
    ->set('deploy_path', '~');    

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    // 'deploy:vendors',
    // 'deploy:symlink',
]);

// Tasks

task('build', function () {
    run('cd release/1/ && cp ~/vendor.zip ./ && unzip vendor.zip');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');

