<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddUuidExtensionToPostgreSql extends Model
{
  
  public function up()
  {
      DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp";');
  }

  public function down()
  {
      DB::statement('DROP EXTENSION IF EXISTS "uuid-ossp";');
  }

}
