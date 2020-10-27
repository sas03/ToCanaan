<?php
namespace App\Http\Repositories;

use App\Orientation;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\DB;

/**
 * Repository class to communicate with data sources of different kinds
 */
class OrientationRepository implements RepositoryInterface
{
  public function findAll()
  {
      $orientations = Orientation::all();

      return $orientations;
  }
}
