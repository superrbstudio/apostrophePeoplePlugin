<?php

class apostropheGeneratepeopleTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
      new sfCommandOption('count', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', '100'),
    ));

    $this->namespace        = 'apostrophe';
    $this->name             = 'generate-people';
    $this->briefDescription = 'Populates project with a bunch of people.';
    $this->detailedDescription = <<<EOF
The [apostrophe:generate-people|INFO] task does things.
Call it with:

  [php symfony apostrophe:generate-people|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    $maleNames = sfConfig::get('sf_plugins_dir') . '/apostrophePeoplePlugin/data/dist.male.first';
    $femaleNames = sfConfig::get('sf_plugins_dir') . '/apostrophePeoplePlugin/data/dist.female.first';
    $lastNames = sfConfig::get('sf_plugins_dir') . '/apostrophePeoplePlugin/data/dist.all.last';

    $maleNames = file_get_contents($maleNames);
    $femaleNames = file_get_contents($femaleNames);
    $lastNames = file_get_contents($lastNames);

    $maleNames = explode("\n", $maleNames);
    $femaleNames = explode("\n", $femaleNames);
    $lastNames = explode("\n", $lastNames);

    foreach($maleNames as &$line)
    {
      $line = explode(' ', $line);
    }

    foreach($femaleNames as &$line)
    {
      $line = explode(' ', $line);
    }

    foreach($lastNames as &$line)
    {
      $line = explode(' ', $line);
    }

    for ($i = 0; $i < $options['count']; $i++)
    {
      $firstName = '';
      $lastName = '';

      if (rand(0,1) == 1)
      {
        $firstName = $maleNames[rand(0, (count($maleNames) - 1))];
        $firstName = trim($firstName[0]);
        $firstName = ucfirst(strtolower($firstName));
      }
      else
      {
        $firstName = $femaleNames[rand(0, (count($femaleNames) - 1))];
        $firstName = trim($firstName[0]);
        $firstName = ucfirst(strtolower($firstName));
      }

      $lastName = $lastNames[rand(0, (count($lastNames) - 1))];
      $lastName = trim($lastName[0]);
      $lastName = ucfirst(strtolower($lastName));

      $person = new aPerson();
      $person->first_name = $firstName;
      $person->last_name = $lastName;
      $person->save();

      echo "Creating " . $person . "...\n";
    }
  }
}
