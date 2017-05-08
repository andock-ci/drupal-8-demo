<?php

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}
// Site keytec, environment dev
$aliases['dev'] = array(
  'root' => '/var/www/html/keytec.dev/docroot',
  'ac-site' => 'keytec',
  'ac-env' => 'dev',
  'ac-realm' => 'devcloud',
  'uri' => 'keytec9ijay54kxx.devcloud.acquia-sites.com',
  'remote-host' => 'keytec9ijay54kxx.ssh.devcloud.acquia-sites.com',
  'remote-user' => 'keytec.dev',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);
$aliases['dev.livedev'] = array(
  'parent' => '@keytec.dev',
  'root' => '/mnt/gfs/keytec.dev/livedev/docroot',
);

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}
// Site keytec, environment prod
$aliases['prod'] = array(
  'root' => '/var/www/html/keytec.prod/docroot',
  'ac-site' => 'keytec',
  'ac-env' => 'prod',
  'ac-realm' => 'devcloud',
  'uri' => 'keytecezmxawbfvs.devcloud.acquia-sites.com',
  'remote-host' => 'srv-4478.devcloud.hosting.acquia.com',
  'remote-user' => 'keytec.prod',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);
$aliases['prod.livedev'] = array(
  'parent' => '@keytec.prod',
  'root' => '/mnt/gfs/keytec.prod/livedev/docroot',
);

if (!isset($drush_major_version)) {
  $drush_version_components = explode('.', DRUSH_VERSION);
  $drush_major_version = $drush_version_components[0];
}
// Site keytec, environment test
$aliases['test'] = array(
  'root' => '/var/www/html/keytec.test/docroot',
  'ac-site' => 'keytec',
  'ac-env' => 'test',
  'ac-realm' => 'devcloud',
  'uri' => 'keytecmixua6flkp.devcloud.acquia-sites.com',
  'remote-host' => 'srv-4478.devcloud.hosting.acquia.com',
  'remote-user' => 'keytec.test',
  'path-aliases' => array(
    '%drush-script' => 'drush' . $drush_major_version,
  )
);
$aliases['test.livedev'] = array(
  'parent' => '@keytec.test',
  'root' => '/mnt/gfs/keytec.test/livedev/docroot',
);
