<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;

class ExpensesController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'market' => 'required|string|max:255',
        ]);

        try {
            $createExpenses = Expenses::createExpense($validated);
            return response()->json([
                'success' => true,
                'data' => $createExpenses,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Algo deu errado!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function listAll()
    {
        try {
            $listAllExpenses = Expenses::listAll();
            return response()->json([
                'success' => true,
                'data' => $listAllExpenses
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Algo deu errado!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function listByMarket(Request $request)
    {
        $market = $request->get('market');

        try {
            $listByMarket = Expenses::listByMarket($market);
            return response()->json([
                'success' => true,
                'data' => $listByMarket
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Algo deu errado!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            Expenses::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Compra deletada com sucesso!'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Algo deu errado!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
