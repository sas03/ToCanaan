<?php
namespace App\Http\Repositories;

use App\Parcours;

/**
 * Repository class to communicate with data sources of different kinds
 */
class ParcoursRepository implements RepositoryInterface
{
    /**
     * Trouve un parcours par l'id
     *
     * @param int $id
     * @return \App\Parcours
     */
    public function findById($id)
    {
        $parcours = Parcours::where('id', $id)->first();

        return $parcours;
    }





    /**
     * Renvoie un tableau avec les coordonnées de l'abscisse en fonction
     * du niveau de sortie max de la (ou des) formation(s).
     *
     * @param string $niveauMax
     * @return array
     */
    public function coordonneesAbscisseParcours($niveauMax)
    {
      if (empty($niveauMax)) {
        $x = [
            'bac - 3' => 40,
            'bac - 1' => 132,
            'bac' => 224,
            'bac + 1' => 316,
            'bac + 2' => 408,
            'bac + 3' => 500,
            'bac + 4' => 592,
            'bac + 5' => 684,
            'bac + 6' => 776,
            'bac + 7' => 868,
            'bac + 8' => 960,
            'bac + 9' => 1052
        ];
      }

      else {
        $niveaux = ['brevet', 'CAP ou équivalent', 'bac ou équivalent', 'bac + 1', 'bac + 2', 'bac + 3', 'bac + 4', 'bac + 5', 'bac + 6', 'bac + 7', 'bac + 8', 'bac + 9 et plus'];

        $niveauPos = array_search($niveauMax, $niveaux);

        if (strpos($niveauMax, 'seconde') || strpos($niveauMax, '1ere') || strpos($niveauMax, '3e') || strpos($niveauMax, 'sans diplôme') || strpos($niveauMax, 'non renseigné') || strpos($niveauMax, 'autre formation')) {
            $niveauPos = 0;
        }

        switch ($niveauPos) {
            case 0:
                $x = [
                'bac - 3' => 530
                ];
                break;
            case 1:
                $x = [
                'bac - 3' => 30,
                'bac - 1' => 1050
                ];
                break;
            case 2:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 530,
                    'bac' => 1020
                ];
                break;
            case 3:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 250,
                    'bac' => 500,
                    'bac + 1' => 1050
                ];
                break;
            case 4:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 250,
                    'bac' => 500,
                    'bac + 1' => 800,
                    'bac + 2' => 1050
                ];
                break;
            case 5:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 150,
                    'bac' => 320,
                    'bac + 1' => 550,
                    'bac + 2' => 800,
                    'bac + 3' => 1050
                ];
                break;
            case 6:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 110,
                    'bac' => 200,
                    'bac + 1' => 380,
                    'bac + 2' => 600,
                    'bac + 3' => 830,
                    'bac + 4' => 1050
                ];
                break;
            case 7:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 150,
                    'bac' => 270,
                    'bac + 1' => 410,
                    'bac + 2' => 570,
                    'bac + 3' => 730,
                    'bac + 4' => 890,
                    'bac + 5' => 1050
                ];
                break;
            case 8:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 110,
                    'bac' => 180,
                    'bac + 1' => 300,
                    'bac + 2' => 450,
                    'bac + 3' => 600,
                    'bac + 4' => 750,
                    'bac + 5' => 900,
                    'bac + 6' => 1040
                ];
                break;
            case 9:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 110,
                    'bac' => 200,
                    'bac + 1' => 300,
                    'bac + 2' => 420,
                    'bac + 3' => 550,
                    'bac + 4' => 690,
                    'bac + 5' => 820,
                    'bac + 6' => 930,
                    'bac + 7' => 1050
                ];
                break;
            case 10:
                $x = [
                    'bac - 3' => 30,
                    'bac - 1' => 110,
                    'bac' => 200,
                    'bac + 1' => 300,
                    'bac + 2' => 410,
                    'bac + 3' => 520,
                    'bac + 4' => 620,
                    'bac + 5' => 730,
                    'bac + 6' => 830,
                    'bac + 7' => 940,
                    'bac + 8' => 1050
                ];
                break;

            default:
                $x = [
                    'bac - 3' => 40,
                    'bac - 1' => 132,
                    'bac' => 224,
                    'bac + 1' => 316,
                    'bac + 2' => 408,
                    'bac + 3' => 500,
                    'bac + 4' => 592,
                    'bac + 5' => 684,
                    'bac + 6' => 776,
                    'bac + 7' => 868,
                    'bac + 8' => 960,
                    'bac + 9' => 1052
                ];
                break;
            }
      }

      return $x;
    }





    /**
     * Renvoie un tableau avec les coordonnées de l'ordonnée
     *
     * @return array
     */
    public function coordonneesOrdonneeParcours()
    {
      $y = [
        'niveau_0' => 330,
        'niveau_1' => 275,
        'niveau_2' => 220,
        'niveau_3' => 165,
        'niveau_4' => 110,
        'niveau_5' => 55,
        'niveau_6' => 10
      ];

      return $y;
    }
}
