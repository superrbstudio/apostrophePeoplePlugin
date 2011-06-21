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

    $maleNames = $this->loadNamesFromCensusFile(sfConfig::get('sf_plugins_dir') . '/apostrophePeoplePlugin/data/dist.male.first');
    $femaleNames = $this->loadNamesFromCensusFile(sfConfig::get('sf_plugins_dir') . '/apostrophePeoplePlugin/data/dist.female.first');
    $lastNames = $this->loadNamesFromCensusFile(sfConfig::get('sf_plugins_dir') . '/apostrophePeoplePlugin/data/dist.all.last');

    $conn = Doctrine_Manager::connection();

    try
    {
      $conn->beginTransaction();

      for ($i = 0; $i < $options['count']; $i++)
      {
        $firstName = '';
        $lastName = '';

        if (rand(0,1) == 1)
        {
          $firstName = $maleNames[rand(0, (count($maleNames) - 1))];
          $firstName = trim($firstName[0]);
          $firstName = ucfirst(strtolower($firstName));
          $sex = 'Male';
        }
        else
        {
          $firstName = $femaleNames[rand(0, (count($femaleNames) - 1))];
          $firstName = trim($firstName[0]);
          $firstName = ucfirst(strtolower($firstName));
          $sex = 'Female';
        }

        $lastName = $lastNames[rand(0, (count($lastNames) - 1))];
        $lastName = trim($lastName[0]);
        $lastName = ucfirst(strtolower($lastName));
        
        $email = strtolower($firstName . '+' . rand(0, 100000) . '@example.com');

        $person = new aPerson();
        $person->first_name = $firstName;
        $person->last_name = $lastName;
        $person->email = $email;
        $person->sex = $sex;
        $person->save();

        echo "Creating " . $person . "...\n";
      }

      $conn->commit();
    }
    catch (Exception $e)
    {
      $conn->rollback();
      var_dump($e->getMessage());
    }

  }

  public function loadNamesFromCensusFile($filename)
  {
    $data = file_get_contents($filename);
    $data = explode("\n", $data);

    foreach($data as &$row)
    {
      $row = preg_split('/\s+/', trim($row));
    }

    return $data;
  }
}
