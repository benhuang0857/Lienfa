<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Exception;

trait ApiResponse
{
    /**
     * 成功回應
     *
     * @param mixed $data 資料（可以是陣列、物件或 null）
     * @param string|null $clientMsg 客戶端訊息
     * @param int $code HTTP 狀態碼
     * @return JsonResponse
     */
    protected function success(
        $data = null,
        $clientMsg = null,
        int $code = 200
    ): JsonResponse {
        // 處理 Resource 和 ResourceCollection
        if ($data instanceof JsonResource || $data instanceof ResourceCollection) {
            $data = $data->resolve();
        }

        return response()->json([
            'code' => $code,
            'client_msg' => $clientMsg,
            'data' => $data
        ], $code);
    }

    /**
     * 錯誤回應
     *
     * @param Exception|string|array $error 錯誤資訊
     * @param string|null $clientMsg 客戶端訊息
     * @param int $code HTTP 狀態碼
     * @return JsonResponse
     */
    protected function error(
        $error,
        int $code = 400,
        $clientMsg = null
    ): JsonResponse {
        // 如果是 Exception 物件
        if ($error instanceof Exception) {
            $errorData = config('app.debug') ? [
                'message' => $error->getMessage(),
                'file' => $error->getFile(),
                'line' => $error->getLine(),
                'trace' => $error->getTraceAsString()
            ] : [
                'message' => $error->getMessage()
            ];
        }
        // 如果是字串
        elseif (is_string($error)) {
            $errorData = ['message' => $error];
        }
        // 如果是陣列
        else {
            $errorData = $error;
        }

        return response()->json([
            'code' => $code,
            'client_msg' => $clientMsg,
            'data' => $errorData
        ], $code);
    }

    /**
     * 分頁回應
     *
     * @param mixed $paginator Laravel 分頁物件
     * @param string|null $clientMsg 客戶端訊息
     * @return JsonResponse
     */
    protected function paginated(
        $paginator,
        $clientMsg = null
    ): JsonResponse {
        return response()->json([
            'code' => 200,
            'client_msg' => $clientMsg,
            'data' => [
                'list' => $paginator->items(),
                'pagination' => [
                    'current_page' => $paginator->currentPage(),
                    'last_page' => $paginator->lastPage(),
                    'per_page' => $paginator->perPage(),
                    'total' => $paginator->total(),
                    'from' => $paginator->firstItem(),
                    'to' => $paginator->lastItem(),
                ],
            ]
        ]);
    }

    /**
     * 創建成功回應（201）
     *
     * @param mixed $data 資料
     * @param string|null $clientMsg 客戶端訊息
     * @return JsonResponse
     */
    protected function created($data = null, $clientMsg = null): JsonResponse
    {
        return $this->success($data, $clientMsg, 201);
    }

    /**
     * 無內容回應（204）
     *
     * @param string|null $clientMsg 客戶端訊息
     * @return JsonResponse
     */
    protected function noContent($clientMsg = null): JsonResponse
    {
        return response()->json([
            'code' => 204,
            'client_msg' => $clientMsg,
            'data' => null
        ], 204);
    }

    /**
     * 未授權回應（401）
     *
     * @param string $message 訊息
     * @return JsonResponse
     */
    protected function unauthorized(string $message = 'Unauthorized'): JsonResponse
    {
        return $this->error($message, 401);
    }

    /**
     * 禁止訪問回應（403）
     *
     * @param string $message 訊息
     * @return JsonResponse
     */
    protected function forbidden(string $message = 'Forbidden'): JsonResponse
    {
        return $this->error($message, 403);
    }

    /**
     * 找不到資源回應（404）
     *
     * @param string $message 訊息
     * @return JsonResponse
     */
    protected function notFound(string $message = 'Resource not found'): JsonResponse
    {
        return $this->error($message, 404);
    }

    /**
     * 驗證失敗回應（422）
     *
     * @param mixed $errors 驗證錯誤
     * @return JsonResponse
     */
    protected function validationError($errors): JsonResponse
    {
        return $this->error($errors, 422);
    }

    /**
     * 伺服器錯誤回應（500）
     *
     * @param Exception|string $error 錯誤資訊
     * @return JsonResponse
     */
    protected function serverError($error): JsonResponse
    {
        return $this->error($error, 500);
    }
}
