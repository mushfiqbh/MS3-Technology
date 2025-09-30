<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Expert;
use App\Models\Activity;
use App\Models\Consultation;


class PublicPageController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $activities = Activity::with('images')->orderBy('activity_date', 'desc')->limit(3)->get();

        $stats = [
            ['label' => 'Happy Clients', 'value' => 150],
            ['label' => 'Completed Projects', 'value' => 320],
            ['label' => 'Employees', 'value' => 75],
            ['label' => 'Awards', 'value' => 25],
            ['label' => 'Partners', 'value' => 40],
        ];

        $heroVideo = DB::table('settings')->where('key', 'hero_video')->value('value');

        return view('pages.home', compact('clients', 'activities', 'stats', 'heroVideo'));
    }


    /*=========================================================================
    |                               Public Pages                               |
    =========================================================================*/

    public function experts()
    {
        $experts = Expert::all();
        return view('pages.experts', compact('experts'));
    }

    public function clients()
    {
        $clients = Client::all();
        return view('pages.clients', compact('clients'));
    }

    public function solutionDetails($id)
    {
        // Placeholder for solution details logic
        return view('pages.solution-details', compact('id'));
    }

    public function careers()
    {
        // Placeholder for careers listing logic
        return view('pages.careers');
    }

    public function careerDetails($id)
    {
        // Placeholder for career details logic
        return view('pages.career-details', compact('id'));
    }

    public function activities(Request $request)
    {
        $query = Activity::with('images');

        // Filter by category if provided
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        // Filter by status if provided
        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('category', 'like', "%{$searchTerm}%");
            });
        }

        $activities = $query->orderBy('activity_date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pages.activities', compact('activities'));
    }

    public function activityDetails($id)
    {
        $activity = Activity::with('images')->findOrFail($id);
        $relatedActivities = Activity::with('images')
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('pages.activity-details', compact('activity', 'relatedActivities'));
    }



    /*=========================================================================
    |                           Additional Public Pages                        |
    =========================================================================*/

    public function contact()
    {
        return view('public-pages.contact');
    }

    public function aboutUs()
    {
        return view('public-pages.about-us');
    }

    public function privacyPolicy()
    {
        return view('public-pages.privacy-policy');
    }

    public function termsOfService()
    {
        return view('public-pages.terms-of-service');
    }

    public function showConsultationForm()
    {
        return view('public-pages.consultation');
    }

    public function submitConsultation(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'service_type' => 'required|in:web_development,mobile_development,consulting,other',
            'budget_range' => 'nullable|in:under_5k,5k_15k,15k_50k,50k_plus,discuss',
            'timeline' => 'nullable|in:asap,1_month,3_months,6_months,flexible',
            'project_description' => 'required|string',
            'agreement' => 'required|accepted'
        ]);

        try {
            // Create consultation record
            $consultation = Consultation::create([
                'client_name' => $validatedData['first_name'] . ' ' . $validatedData['last_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'] ?? null,
                'company' => $validatedData['company'] ?? null,
                'service_type' => $validatedData['service_type'],
                'budget_range' => $validatedData['budget_range'] ?? null,
                'timeline' => $validatedData['timeline'] ?? null,
                'description' => $validatedData['project_description'],
                'status' => 'pending',
                'consultation_date' => now(),
                'submitted_at' => now()
            ]);

            // Send notification email (optional)
            // You can implement email notification here

            return response()->json([
                'success' => true,
                'message' => 'Consultation request submitted successfully!',
                'consultation_id' => $consultation->id
            ]);
        } catch (\Exception $e) {
            Log::error('Consultation submission error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your request. Please try again.'
            ], 500);
        }
    }
}
