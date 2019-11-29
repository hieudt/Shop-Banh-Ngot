<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'shop-bn');

// Project repository
set('repository', 'https://github.com/hieuleader/Shop-Banh-Ngot.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', [
    '.env'
]);
add('shared_dirs', [
    'storage',
    'bootstrap/cache',
]);

// Writable dirs by web server 
add('writable_dirs', [
    'bootstrap/cache',
    'storage',
    'storage/app/public',
    'storage/framework',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
]);
set('allow_anonymous_stats', false);

// Hosts

host('35.240.156.156')
    ->user('roggin')
    ->set('deploy_path', '~/{{application}}')
    ->stage('development');

    set('keep_releases', 5);
    set('branch', 'master');
    set('http_user', 'roggin');
    set('default_stage', 'development');

    
// Tasks
task('clear-config', [
    'artisan:cache:clear',
    'artisan:config:cache',
    'artisan:view:clear',
    'artisan:view:cache',
    'artisan:migrate',
]);

task('rm-cache', function () {
    run('cd {{release_path}}/bootstrap/cache/ && rm -rf *.php');
});

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'rm-cache',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
]);

task('reload:php-fpm', function () {
    run('sudo /etc/init.d/php7.3-fpm reload');
})->desc('PHP7 Reloaded');

after('deploy', 'success');
before('deploy:symlink', 'clear-config'); // run migrate
after('deploy:failed', 'deploy:unlock');
after('cleanup', 'reload:php-fpm');

