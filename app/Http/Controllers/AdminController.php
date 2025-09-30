<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Client;
use App\Models\Career;
use App\Models\Consultation;
use App\Models\Solution;
use App\Models\Activity;
use App\Models\ActivityImage;

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

        $heroVideo = DB::table('settings')->where('key', 'hero_video')->value('value');

        return view('admin.dashboard', compact('records', 'heroVideo'));
    }

    public function experts()
    {
        $experts = Expert::all();
        return view('admin.experts', compact('experts'));
    }

    public function updateSettings()
    {
        $validated = request()->validate([
            'hero_video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:51200',
        ]);

        if (request()->hasFile('hero_video')) {
            $validated['hero_video_url'] = request()->file('hero_video')->store('hero', 'public');

            // delete old video if exists
            $oldVideo = DB::table('settings')->where('key', 'hero_video')->value('value');
            if ($oldVideo && Storage::disk('public')->exists($oldVideo)) {
                Storage::disk('public')->delete($oldVideo);
            }

            DB::table('settings')->updateOrInsert(
                ['key' => 'hero_video'],
                ['value' => $validated['hero_video_url']]
            );
        }

        return back()->with('success', 'Hero media updated successfully!');
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
        $activities = Activity::with('images')->get();
        return view('admin.activities', compact('activities'));
    }

    public function uploadActivityImage(Request $request, $activityId)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ]);

        $activity = Activity::findOrFail($activityId);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('activities', $filename, 'public');

            $activityImage = ActivityImage::create([
                'activity_id' => $activity->id,
                'image_path' => $imagePath,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Image uploaded successfully!',
                'image' => [
                    'id' => $activityImage->id,
                    'url' => asset('storage/' . $imagePath),
                    'path' => $imagePath
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No image file provided'
        ], 400);
    }

    public function deleteActivityImage($activityImageId)
    {
        $activityImage = ActivityImage::findOrFail($activityImageId);

        if ($activityImage->image_path && Storage::disk('public')->exists($activityImage->image_path)) {
            Storage::disk('public')->delete($activityImage->image_path);
        }

        $activityImage->delete();

        return response()->json([
            'success' => true,
            'message' => 'Activity image deleted successfully!'
        ]);
    }

    public function createActivity(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'category' => 'nullable|string|max:100',
            'activity_date' => 'nullable|date',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:upcoming,ongoing,completed,cancelled',
        ]);

        $activity = Activity::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Activity created successfully!',
            'activity_id' => $activity->id,
            'activity' => $activity
        ]);
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
        ]);

        $activity->update($validated);

        return back()->with('success', 'Activity updated successfully!');
    }

    public function deleteActivity($id)
    {
        $activity = Activity::with('images')->findOrFail($id);

        // Delete associated images if exists
        foreach ($activity->images as $image) {
            if ($image->image_path && Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }

        $activity->delete();

        return back()->with('success', 'Activity deleted successfully!');
    }
};
