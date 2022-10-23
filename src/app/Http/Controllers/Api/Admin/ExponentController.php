<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Exponent\CreateExponentRequest;
use App\Http\Requests\Api\Exponent\UpdateExponentRequest;
use App\Http\Resources\Exponent\ExponentNoRelationsResource;
use App\Http\Resources\Exponent\ExponentResource;
use App\Models\Exponent;
use App\Services\FileManager;
use App\Services\PerPageResolver;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ExponentController extends Controller
{
    protected FileManager $fileManager;

    public function __construct(FileManager $fileManager)
    {
        $this->fileManager = $fileManager;
    }

    public function index()
    {
        $exponents = QueryBuilder::for(Exponent::class)
            ->allowedFilters([
                'name',
                'slug',
                AllowedFilter::exact('sector_id'),
                'inn',
                'active',
                'verification_status',
                'is_import_substitution',
                'published_at',
                AllowedFilter::scope('byUserFullName'),
            ])
            ->paginate(PerPageResolver::resolve(25))
            ->appends(request()->query());
        return ExponentNoRelationsResource::collection($exponents);
    }

    public function store(CreateExponentRequest $request)
    {
        $inputData = $request->validated();
        $inputData['logo_path'] = $this->fileManager->upload($request->file('logo'));
        $inputData['main_img_path'] = $this->fileManager->upload($request->file('main_img'));
        $exponent = Exponent::create($inputData);
        return ExponentResource::make($exponent);
    }

    public function show(Exponent $exponent)
    {
        return ExponentResource::make($exponent);
    }

    public function update(UpdateExponentRequest $request, Exponent $exponent)
    {
        $inputData = $request->validated();
        if ($request->hasFile('logo')) {
            $this->fileManager->delete($exponent->logo_path);
            $inputData['logo_path'] = $this->fileManager->upload($request->file('logo'));
        }
        if ($request->hasFile('main_img')) {
            $this->fileManager->delete($exponent->main_img_path);
            $inputData['main_img_path'] = $this->fileManager->upload($request->file('main_img'));
        }
        $exponent->update($inputData);
        return ExponentResource::make($exponent);
    }

    public function destroy(Exponent $exponent)
    {
        $exponent->delete();
        return response()->noContent();
    }
}
