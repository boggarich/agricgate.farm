<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/rsync.php';


set('application', 'Agricgate.farm');
set('repository', 'https://github.com/boggarich/agricgate.farm.git'); // Git Repository
set('ssh_multiplexing', true);  // Speed up deployment
//set('default_timeout', 1000);

set('rsync_src', function () {
    return __DIR__; // If your project isn't in the root, you'll need to change this.
});

// Configuring the rsync exclusions.
// You'll want to exclude anything that you don't want on the production server.
add('rsync', [
    'exclude' => [
        '.git',
        '/.env',
        '/storage/',
        '/vendor/',
        '/node_modules/',
        '.github',
        'deploy.php',
    ],
]);

// Set up a deployer task to copy secrets to the server.
// Grabs the dotenv file from the github secret
task('deploy:secrets', function () {
    file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
    upload('.env', get('deploy_path') . '/shared');
});

///////////////////////////////////
// Hosts
///////////////////////////////////

host('agricgate.farm') // Name of the server
->setHostname('162.0.229.248') // Hostname or IP address
->set('remote_user', 'agrigcwj') // SSH user
->set('port', '21098')
->set('ssh_arguments', ['-v', '-o PubkeyAcceptedKeyTypes=+ssh-rsa
', '-o HostKeyAlgorithms=+ssh-rsa', '-o StrictHostKeyChecking=no'])
->set('branch', 'main') // Git branch
->set('deploy_path', 'public_html'); // Deploy path

after('deploy:failed', 'deploy:unlock');  // Unlock after failed deploy

///////////////////////////////////
// Tasks
///////////////////////////////////

desc('Deploy the application');

task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:secrets',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'artisan:queue:restart',
    'deploy:unlock'
]);