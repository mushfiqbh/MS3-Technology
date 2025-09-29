<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Client;
use App\Models\Career;
use App\Models\Consultation;
use App\Models\Solution;
use App\Models\Activity;

class AdminController extends Controller
{
    public function index()
    {
        $records = [
            'experts' => Expert::count(),
            'clients' => Client::count(),
            'careers' => Career::count(),
            'consultations' => Consultation::count(),
            'solutions' => Solution::count(),
            'activities' => Activity::count(),
        ];
        return view('admin.dashboard', compact('records'));
    }

    public function experts()
    {
        $experts = Expert::all();
        return view('admin.experts', compact('experts'));
    }

    // ============================ EXPERT MANAGEMENT ============================
    public function createExpert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'required|image|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo_url'] = $request->file('photo')->store('experts', 'public');
        }

        Expert::create($validated);

        return back()->with('success', 'Expert added successfully!');
    }

    public function updateExpert(Request $request, $id)
    {
        $expert = Expert::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            if ($expert->photo_url && Storage::disk('public')->exists($expert->photo_url)) {
                Storage::disk('public')->delete($expert->photo_url);
            }
            $validated['photo_url'] = $request->file('photo')->store('experts', 'public');
        }

        $expert->update($validated);

        return back()->with('success', 'Expert updated successfully!');
    }

    public function deleteExpert($id)
    {
        $expert = Expert::findOrFail($id);

        if ($expert->photo_url && Storage::disk('public')->exists($expert->photo_url)) {
            Storage::disk('public')->delete($expert->photo_url);
        }

        $expert->delete();

        return back()->with('success', 'Expert deleted successfully!');
    }

    // ============================ CLIENT MANAGEMENT ============================
    public function clients()
    {
        $clients = Client::all();
        return view('admin.clients', compact('clients'));
    }

    public function createClient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'logo' => 'required|image|max:5120',
            'note' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo_url'] = $request->file('logo')->store('clients', 'public');
        }

        Client::create($validated);

        return back()->with('success', 'Client added successfully!');
    }

    public function updateClient(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:5120',
            'note' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            if ($client->logo_url && Storage::disk('public')->exists($client->logo_url)) {
                Storage::disk('public')->delete($client->logo_url);
            }
            $validated['logo_url'] = $request->file('logo')->store('clients', 'public');
        }

        $client->update($validated);

        return back()->with('success', 'Client updated successfully!');
    }

    public function deleteClient($id)
    {
        $client = Client::findOrFail($id);

        if ($client->logo_url && Storage::disk('public')->exists($client->logo_url)) {
            Storage::disk('public')->delete($client->logo_url);
        }

        $client->delete();

        return back()->with('success', 'Client deleted successfully!');
    }

    // ============================ CAREER MANAGEMENT ============================
    public function careers()
    {
        $careers = Career::all();
        return view('admin.careers', compact('careers'));
    }

    public function createCareer(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|in:Full-time,Part-time,Internship,Contract',
            'status' => 'nullable|string|in:Open,Closed',
        ]);

        Career::create($validated);

        return back()->with('success', 'Career added successfully!');
    }

    public function updateCareer(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'nullable|string|in:Full-time,Part-time,Internship,Contract',
            'status' => 'nullable|string|in:Open,Closed',
        ]);

        $career->update($validated);

        return back()->with('success', 'Career updated successfully!');
    }

    public function deleteCareer($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return back()->with('success', 'Career deleted successfully!');
    }

    // ============================ CONSULTATION MANAGEMENT ============================
    public function consultations()
    {
        $consultations = Consultation::all();
        return view('admin.consultations', compact('consultations'));
    }

    public function createConsultation(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:150',
            'project_type' => 'nullable|string|max:100',
            'budget_type' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'preferred_contact_method' => 'nullable|string|in:Email,Phone,WhatsApp,Other',
            'project_description' => 'nullable|string',
            'status' => 'required|string|in:Pending,In Progress,Completed,Rejected',
        ]);

        Consultation::create($validated);

        return back()->with('success', 'Consultation added successfully!');
    }

    public function updateConsultation(Request $request, $id)
    {
        $consultation = Consultation::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:150',
            'project_type' => 'nullable|string|max:100',
            'budget_type' => 'nullable|string|max:100',
            'timeline' => 'nullable|string|max:100',
            'preferred_contact_method' => 'nullable|string|in:Email,Phone,WhatsApp,Other',
            'project_description' => 'nullable|string',
            'status' => 'required|string|in:Pending,In Progress,Completed,Rejected',
        ]);

        $consultation->update($validated);

        return back()->with('success', 'Consultation updated successfully!');
    }

    public function deleteConsultation($id)
    {
        $consultation = Consultation::findOrFail($id);
        $consultation->delete();

        return back()->with('success', 'Consultation deleted successfully!');
    }

    // ============================ SOLUTION MANAGEMENT ============================
    public function solutions()
    {
        $solutions = Solution::all();
        return view('admin.solutions', compact('solutions'));
    }

    public function createSolution(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Solution::create($validated);

        return back()->with('success', 'Solution added successfully!');
    }

    public function updateSolution(Request $request, $id)
    {
        $solution = Solution::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $solution->update($validated);

        return back()->with('success', 'Solution updated successfully!');
    }

    public function deleteSolution($id)
    {
        $solution = Solution::findOrFail($id);
        $solution->delete();

        return back()->with('success', 'Solution deleted successfully!');
    }

    // ============================ ACTIVITY MANAGEMENT ============================
    public function activities()
    {
        $activities = Activity::all();
        return view('admin.activities', compact('activities'));
    }

    public function createActivity(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'nullable|string|max:100',
            'activity_date' => 'nullable|date',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:upcoming,ongoing,completed,cancelled',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_url'] = $request->file('image')->store('activities', 'public');
        }

        // Remove the 'image' field since we're storing 'image_url'
        unset($validated['image']);

        Activity::create($validated);

        return back()->with('success', 'Activity added successfully!');
    }

    public function updateActivity(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'nullable|string|max:100',
            'activity_date' => 'nullable|date',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:upcoming,ongoing,completed,cancelled',
            'image' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($activity->image_url && Storage::disk('public')->exists($activity->image_url)) {
                Storage::disk('public')->delete($activity->image_url);
            }
            $validated['image_url'] = $request->file('image')->store('activities', 'public');
        }

        // Remove the 'image' field since we're storing 'image_url'
        unset($validated['image']);

        $activity->update($validated);

        return back()->with('success', 'Activity updated successfully!');
    }

    public function deleteActivity($id)
    {
        $activity = Activity::findOrFail($id);
        
        // Delete associated image if exists
        if ($activity->image_url && Storage::disk('public')->exists($activity->image_url)) {
            Storage::disk('public')->delete($activity->image_url);
        }
        
        $activity->delete();

        return back()->with('success', 'Activity deleted successfully!');
    }
};
