<?php
namespace App\Http\Repositories;

use App\Code;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\DB;

/**
 * Repository class to communicate with data sources of different kinds
 */
class CodesRepository implements RepositoryInterface
{
    /**
     * Selectionne tous les codes et renvoie une collection
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        $codes = Code::all();

        return $codes;
    }





    /**
     * Selectionne tous les codes et renvoie une pagination
     *
     * @param int $number
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function findAllWithPaginate($number)
    {
        $codes = Code::paginate($number);

        return $codes;
    }





    /**
     * Selectionne un code par libellé
     *
     * @param string $codeROME
     * @return \App\Code
     */
    public function findByCodeROME($codeROME)
    {
        $code = Code::where('code_rome', '=', "$codeROME")->first();

        return $code;
    }





    /**
     * Sélectionne un (ou plusieurs) code par son id et renvoie une collection
     *
     * @param string $codeROME
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByCodeROMEAsCollection($codeROME)
    {
        $code = Code::where('code_rome', '=', "$codeROME")->get();

        return $code;
    }





    /**
     * Renvoie le nombre total de codes enregistrés
     *
     * @return int
     */
    public function countAll()
    {
        $codes = count(Code::select('id')->get());

        return $codes;
    }





    /**
     * Sélectionne un code par son id
     *
     * @param int $id
     * @return \App\Code
     */
    public function findById($id)
    {
        $code = Code::find($id);

        return $code;
    }






    /**
     * Sélectionne un code par son id et renvoie une collection
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByIdAsCollection($id)
    {
        $code = Code::where('id', '=', $id)->get();

        return $code;
    }





    /**
     * Trouve un code par son id ou créé un nouveau code si l'id ne renvoie rien
     *
     * @param int $id
     * @return \App\Code
     */
    public function findByIdOrInstantiate($id)
    {
        $code = Code::firstOrNew(['id' => $id]);

        return $code;
    }





    /**
     * Supprime un code grâce à son id
     *
     * @param int $id
     * @return \App\Code
     */
    public function delete($id)
    {
        $code = Code::find($id);
        $code->delete();

        return $code;
    }





    /**
     * Met à jour un code par le biais de l'espace Admin
     *
     * @param Request $request
     * @param Code $code
     * @return \App\Code
     */
    public function updateFromAdmin($request, Code $code)
    {
        // on valide les données rentrées par l'utilisateur dans le formulaire
        Validator::make($request->all(), [
            'code_rome' => 'required|string|max:255'
        ])->validate();

        // on met à jour le métier
        $code->code_rome = $request->code;

        $code->save();

        return $code;
    }
}
