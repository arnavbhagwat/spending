<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpendingController extends Controller
{
    public function analyze(Request $request)
    {
        $cardNumber = $request->card_number;
        $from = $request->from;
        $to = $request->to;

        // Simulate or fetch transactions from a mock API or local DB
        $transactions = $this->fetchMockTransactions($cardNumber, $from, $to);

        $categories = [
            'Food' => 0,
            'Fashion' => 0,
            'Tech' => 0,
            'Others' => 0
        ];

        foreach ($transactions as $txn) {
            $cat = $this->categorize($txn['description']);
            $categories[$cat] += $txn['amount'];
        }

        return view('result', ['data' => $categories]);
    }

    private function fetchMockTransactions($card, $from, $to)
    {
        return [
            ['description' => 'Dominos', 'amount' => 500],
            ['description' => 'H&M', 'amount' => 1000],
            ['description' => 'Apple Store', 'amount' => 3000],
            ['description' => 'Amazon', 'amount' => 700],
        ];
    }

    private function categorize($desc)
    {
        $desc = strtolower($desc);
        return match (true) {
            str_contains($desc, 'domino') => 'Food',
            str_contains($desc, 'h&m') || str_contains($desc, 'zara') => 'Fashion',
            str_contains($desc, 'apple') || str_contains($desc, 'amazon') => 'Tech',
            default => 'Others',
        };
    }
}
