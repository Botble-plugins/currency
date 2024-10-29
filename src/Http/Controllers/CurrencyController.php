<?php

namespace Botble\Currency\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Currency\Http\Requests\CurrencyRequest;
use Botble\Currency\Http\Resources\CurrencyApiResource;
use Botble\Currency\Models\Currency;
use Botble\Base\Facades\PageTitle;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Currency\Tables\CurrencyTable;
use Botble\Currency\Forms\CurrencyForm;
use Botble\Currency\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends BaseController
{
    public function search(Request $request)
    {
        $term = $request->search ?? $request->q;

        $currencies = Currency::query()
                    ->select(['id', 'title'])
                    ->whereAny(
                        [
                                'title','symbol',
                            ]
                        , 'LIKE', '%' . strToUpper($term) . '%'
                        )
                    ->paginate(10);

        return $this
                ->httpResponse()
                ->setData(CurrencyApiResource::collection($currencies))->toApiResponse();
    }

    public function updateDefault(Request $request, CurrencyService $currencyService)
    {
        $currencyService->updateDefault($request->currency);

        return $this
                ->httpResponse()
                ->setMessage(trans('core/base::notices.update_success_message'))
                ->toApiResponse();
    }
}
