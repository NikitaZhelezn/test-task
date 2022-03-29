<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Services\PdfFileNoContainWordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\FilePdfRequest;
use App\Services\PdfUploaderService;
use function dd;
use function response;

class FileController extends Controller
{
    /**
     * @param \App\Http\Requests\FilePdfRequest $request
     * @param \App\Services\PdfUploaderService $pdfUploaderService
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadPdf(FilePdfRequest $request, PdfUploaderService $pdfUploaderService)
    {

       /* try {*/

            $pdfUploaderService->upload($request->file('file'));


            return response()->json('', 201);
/*
        } catch (PdfFileNoContainWordException $exception) {

            //Todo Needs to use Service for response Error (for example, Sentry)
            return response()->json('', 422);

        } catch (\Throwable $e) {

            return response()->json('', 500);

        }*/
    }
}
