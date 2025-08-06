<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
         $tests= Test::withCount('questions')->get();
        return view('questions.index', compact('tests'));
    }

    public function show($id)
    {
        $questions = Question::with('test')->where('test_id',$id)->latest()->get();
        if (blank($questions)) abort(404);
        return view('questions.show', compact('questions'));
    }
    public function create()
    {
        $tests=Test::get();
        return view('questions.create',compact('tests'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_id' => 'required|exists:tests,id',

            'questions' => 'required|array|min:1',

            'questions.*.question_title' => 'required|string|max:1000',
            'questions.*.answer_reason' => 'nullable|string|max:1000',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*' => 'required|string|max:1000',

            'questions.*.correct' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    $index = explode('.', $attribute)[1]; // e.g., questions.2.correct
                    $options = $request->input("questions.$index.options", []);
                    if (!isset($options[$value])) {
                        $fail("Correct option index ($value) is invalid for question $index.");
                    }
                }
            ],

            'questions.*.image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        foreach ($validated['questions'] as $index => $q) {
            $imagePath = null;

            // Handle uploaded image for this question (if any)
            if ($request->hasFile("questions.$index.image")) {
                $image = $request->file("questions.$index.image");
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/question'), $fileName); // stores in public/uploads/question/
                $imagePath = 'uploads/question/' . $fileName;
            }

            // Create question
            $question = Question::create([
                'question_title' => $q['question_title'],
                'answer_reason' => $q['answer_reason'],
                'test_id' => $validated['test_id'],
                'image' => $imagePath,
            ]);

            // Create options
            foreach ($q['options'] as $optIndex => $optText) {
                $question->options()->create([
                    'option' => $optText,
                    'is_correct' => (int)$optIndex === (int)$q['correct'],
                ]);
            }
        }

       
        return back()->with('success','Mock up submitted successfully!');
    }

    public function edit($id)
    {
        // dd('hello');
        $questions = Question::with('options','test')->where('test_id', $id)->get();

        if ($questions->isEmpty()) abort(404, 'Mock Up not found.');
        

        return view('questions.edit', [
            'testName' => $questions->first()->test->name,
            'test_id' => $id,
            'questionsData' => $questions
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // 'test_id' => 'required|exists:tests,id',
            'questions' => 'required|array|min:1',
            'questions.*.question_title' => 'required|string',
            'questions.*.answer_reason' => 'nullable|string|max:1000',
            'questions.*.correct' => 'required|integer',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*.text' => 'required|string',
            'questions.*.options.*.id' => 'nullable|integer|exists:options,id',
            'questions.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'questions.*.id' => 'nullable|integer|exists:questions,id',
        ]);

        $existingQuestions = Question::where('test_id', $id)->with('options')->get();
        $submittedQuestionIds = collect($request->questions)->pluck('id')->filter()->map(fn($id) => (int) $id)->toArray();

        foreach ($request->questions as $index => $qData) {
            $questionId = $qData['id'] ?? null;
            $imagePath = null;
            $existing = $questionId ? $existingQuestions->firstWhere('id', $questionId) : null;

            // 🔄 Handle image removal
            if (
                isset($qData['remove_image']) && $qData['remove_image'] == 1 &&
                isset($qData['old_image']) &&
                file_exists(public_path($qData['old_image']))
            ) {
                unlink(public_path($qData['old_image']));
                $imagePath = null;
            }

            // 🆕 Handle new image upload
            elseif ($request->hasFile("questions.$index.image")) {
                if (isset($qData['old_image']) && file_exists(public_path($qData['old_image']))) {
                    unlink(public_path($qData['old_image']));
                }

                $image = $request->file("questions.$index.image");
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/question'), $fileName);
                $imagePath = 'uploads/question/' . $fileName;
            }

            // 🔁 Reuse old image if still valid
            elseif (isset($qData['old_image'])) {
                $imagePath = $qData['old_image'];
            }

            // ✅ Update or create question
            if ($existing) {
                $existing->update([
                    // 'test_name' => $request->test_name,
                    'question_title' => $qData['question_title'],
                    'answer_reason' => $qData['answer_reason'],
                    'image' => $imagePath,
                ]);

                // Match options by ID
                $existingOptions = $existing->options->keyBy('id');
                $submittedOptionIds = [];

                foreach ($qData['options'] as $optIndex => $optData) {
                    $optId = $optData['id'] ?? null;
                    $text = $optData['text'];
                    $isCorrect = (int) $qData['correct'] === (int) $optIndex;

                    if ($optId && $existingOptions->has($optId)) {
                        // Update existing option
                        $option = $existingOptions[$optId];
                        $option->update([
                            'option' => $text,
                            'is_correct' => $isCorrect,
                        ]);
                        $submittedOptionIds[] = $optId;
                    } else {
                        // Create new option
                        $new = $existing->options()->create([
                            'option' => $text,
                            'is_correct' => $isCorrect,
                        ]);
                        $submittedOptionIds[] = $new->id;
                    }
                }

                // Delete removed options
                $optionsToDelete = $existingOptions->whereNotIn('id', $submittedOptionIds);
                $optionsToDelete->each->delete();
            } else {
                // Create new question
                $newQuestion = Question::create([
                    // 'test_name' => $request->test_name,
                    'test_id' => $id,
                    'question_title' => $qData['question_title'],
                    'answer_reason' => $qData['answer_reason'],
                    'image' => $imagePath,
                ]);

                foreach ($qData['options'] as $optIndex => $optData) {
                    $newQuestion->options()->create([
                        'option' => $optData['text'],
                        'is_correct' => (int) $qData['correct'] === (int) $optIndex,
                    ]);
                }
            }
        }

        // 🗑 Delete removed questions
        $questionsToDelete = $existingQuestions->filter(fn($q) => !in_array($q->id, $submittedQuestionIds));
        foreach ($questionsToDelete as $q) {
            if ($q->image && file_exists(public_path($q->image))) {
                unlink(public_path($q->image));
            }
            $q->options()->delete();
            $q->delete();
        }

        
        return back()->with('success','Mock up updated successfully!');
    }


    public function destroy($id)
    {
        // Get all questions for the test
        $questions = Question::where('test_id', $id)->get();

        foreach ($questions as $question) {
            // Delete related options
            $question->options()->delete();

            // Delete question image file if exists
            if ($question->image && file_exists(public_path($question->image))) {
                unlink(public_path($question->image));
            }

            // Delete the question itself
            $question->delete();
        }

        
        return back()->with('success','Test Deleted successfully!');
    }
}
