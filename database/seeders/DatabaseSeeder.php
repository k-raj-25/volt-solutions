<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@voltsolutions.test')],
            [
                'name' => env('ADMIN_NAME', 'Site Admin'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'ChangeMe!2026')),
            ]
        );

        // Safe to run on every deploy: an existing admin keeps their changed password,
        // and sample posts are only added the first time.
        if (! $admin->wasRecentlyCreated || Post::count() > 0) {
            return;
        }

        $samples = [
            [
                'title' => '5 Things to Check Before You Apply for a Business Loan',
                'category' => 'loans',
                'tags' => 'business loan, credit score, documents',
                'excerpt' => 'A short checklist that makes your application faster and stronger.',
                'body' => '<p>Applying for a loan is easier when you are prepared. Start by checking your credit score, then gather your income and identity documents.</p><h2>Your checklist</h2><ul><li>Review your credit report</li><li>Know exactly how much you need</li><li>Compare interest rates and fees</li><li>Prepare income proof and bank statements</li><li>Plan your repayment schedule</li></ul><p>Our team is happy to walk you through each step.</p>',
                'days' => 2,
            ],
            [
                'title' => 'How to Choose the Right Property as a First-Time Buyer',
                'category' => 'real-estate',
                'tags' => 'property, first home, buying guide',
                'excerpt' => 'Location, budget and legal checks: what first-time buyers should look at first.',
                'body' => '<p>Buying your first home is exciting and a little overwhelming. Focus on three things: location, budget, and clear legal title.</p><h2>Set a realistic budget</h2><p>Include registration costs, maintenance and your monthly loan instalment, not just the sale price.</p><p>Talk to us about matching the right property with the right home loan.</p>',
                'days' => 6,
            ],
            [
                'title' => 'Simple Habits That Build a Strong Financial Foundation',
                'category' => 'finance-tips',
                'tags' => 'savings, budgeting, planning',
                'excerpt' => 'Small, consistent money habits that protect your future.',
                'body' => '<p>Financial security is built through small habits repeated over time. Track your spending, build an emergency fund, and keep debt manageable.</p><blockquote>Pay yourself first: set aside savings before you spend.</blockquote><p>Over time these habits become your own financial fortress.</p>',
                'days' => 10,
            ],
        ];

        foreach ($samples as $s) {
            Post::create([
                'title' => $s['title'],
                'slug' => Post::uniqueSlug($s['title']),
                'excerpt' => $s['excerpt'],
                'body' => $s['body'],
                'author_name' => 'Volt Solutions Team',
                'category' => $s['category'],
                'tags' => $s['tags'],
                'status' => 'published',
                'published_at' => now()->subDays($s['days']),
            ]);
        }
    }
}
