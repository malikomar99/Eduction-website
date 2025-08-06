@extends('layouts.vertical', ['title' => 'Edit Mock Up'])

@section('content')
<div class="container my-5">
    <h3 class="mb-4">Edit Mock Up</h3>
    <form method="POST" action="{{ route('questions.update',$test_id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <label class="form-label">Test Name</label>
            <input type="text" disabled readonly class="form-control" name="test_name" value="{{ $testName }}" required>
        </div>

        <div class="mb-3">
            <strong>Total Questions: <span id="questionCount">0</span></strong>
        </div>

        <div id="questionsContainer"></div>

        <div class="d-flex justify-content-between">
            <button type="button" id="addQuestion" class="btn btn-primary">+ Add Question</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection

@push('js')
<script>
const oldQuestions = @json($questionsData);
const testNameFromServer = @json($testName);
const test_id = @json($test_id);
let questionIndex = 0;

function getOptionHTML(qIndex, oIndex, value = "", isCorrect = false, optionId = null) {
    return `
    <div class="mb-2 option-input" data-option="${oIndex}">
        <div class="input-group">
            <div class="input-group-text">
                <input type="radio" name="questions[${qIndex}][correct]" value="${oIndex}" ${isCorrect ? 'checked' : ''}>
            </div>
            <input type="text" class="form-control option-field"
                name="questions[${qIndex}][options][${oIndex}][text]"
                value="${value}" placeholder="Option" data-q="${qIndex}" data-o="${oIndex}" required>
            ${optionId ? `<input type="hidden" name="questions[${qIndex}][options][${oIndex}][id]" value="${optionId}">` : ''}
            <button type="button" class="btn btn-outline-danger remove-option">&times;</button>
        </div>
    </div>
    `;
}

function getQuestionHTML(qIndex, question = {}) {
    const options = (question.options || []).map((opt, i) =>
        getOptionHTML(qIndex, i, opt.option, opt.is_correct, opt.id)
    ).join('') || [0, 1].map(i => getOptionHTML(qIndex, i)).join('');

    return `
    <div class="form-card mb-4 p-3 bg-white rounded shadow-sm" data-qindex="${qIndex}">
        <div class="d-flex justify-content-between">
            <div class="w-100">
                <input type="hidden" name="questions[${qIndex}][id]" value="${question.id || ''}">
                <div class="mb-3">
                    <label>Question ${qIndex + 1}</label>
                    <input type="text" name="questions[${qIndex}][question_title]" class="form-control"
                           value="${question.question_title || ''}" placeholder="Enter question" required>
                </div>
                <div class="mb-3">
                    <label>Correct Answer Reason <span class="text-danger">(optional)</label>
                    <input type="text" name="questions[${qIndex}][answer_reason]" class="form-control"
                           value="${question.answer_reason || ''}" placeholder="Enter Reason Of Correct Answer">
                </div>
                <div class="mb-3 image-upload-container" data-q="${qIndex}">
                    <label>Image (optional)</label>
                    <input type="file" accept="image/*" name="questions[${qIndex}][image]"
                           class="form-control image-input" data-q="${qIndex}">
                    <img src="${question.image ? '/' + question.image : ''}" class="img-preview mt-2 rounded border ${question.image ? '' : 'd-none'}" style="max-width: 200px;">
                    <button type="button" class="btn btn-sm btn-danger mt-2 remove-image ${question.image ? '' : 'd-none'}">Remove Image</button>
                    ${question.image ? `<input type="hidden" name="questions[${qIndex}][old_image]" value="${question.image}">` : ''}
                </div>
                <div class="options-container" data-options="${qIndex}">
                    ${options}
                </div>
                <button type="button" class="btn btn-sm btn-secondary add-option mt-2" data-q="${qIndex}">+ Add Option</button>
            </div>
            <span class="remove-question ms-3 mt-2 text-danger fs-4" title="Remove Question">&times;</span>
        </div>
    </div>
    `;
}

function reindexOptions(container, qIndex) {
    container.find('.option-input').each((i, el) => {
        $(el).attr('data-option', i);
        $(el).find('input[type="radio"]').val(i).attr('name', `questions[${qIndex}][correct]`);
        $(el).find('.option-field').attr({
            name: `questions[${qIndex}][options][${i}][text]`,
            'data-o': i
        });
        $(el).find('input[type="hidden"][name$="[id]"]').attr('name', `questions[${qIndex}][options][${i}][id]`);
    });
}

function addQuestionWithData(q) {
    const qIndex = questionIndex++;
    $('#questionsContainer').append(getQuestionHTML(qIndex, q));
    updateQuestionCount();
}

function updateQuestionCount() {
    $('#questionCount').text($('.form-card').length);
}

// INIT + Events
$(document).on('click', '#addQuestion', function() {
    $('#questionsContainer').append(getQuestionHTML(questionIndex));
    questionIndex++;
    updateQuestionCount();
});

$(document).on('click', '.remove-question', function() {
    $(this).closest('.form-card').remove();
    updateQuestionCount();
});

$(document).on('click', '.add-option', function() {
    const qIndex = $(this).data('q');
    const container = $(`.form-card[data-qindex="${qIndex}"] .options-container`);
    const currentCount = container.children('.option-input').length;
    container.append(getOptionHTML(qIndex, currentCount));
});

$(document).on('click', '.remove-option', function() {
    const container = $(this).closest('.form-card').find('.options-container');
    $(this).closest('.option-input').remove();
    const qIndex = container.closest('.form-card').data('qindex');
    reindexOptions(container, qIndex);
});

$(document).on('change', '.image-input', function() {
    const input = this;
    const qIndex = $(this).data('q');
    const container = $(`.image-upload-container[data-q="${qIndex}"]`);
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            container.find('.img-preview').attr('src', e.target.result).removeClass('d-none');
            container.find('.remove-image').removeClass('d-none');
        };
        reader.readAsDataURL(file);
    }
});

$(document).on('click', '.remove-image', function() {
    const container = $(this).closest('.image-upload-container');
    const qIndex = container.data('q');

    container.find('.image-input').val('');
    container.find('.img-preview').attr('src', '').addClass('d-none');
    container.find('.remove-image').addClass('d-none');

    if (container.find(`input[name="questions[${qIndex}][remove_image]"]`).length === 0) {
        container.append(`<input type="hidden" name="questions[${qIndex}][remove_image]" value="1">`);
    }
});

/*$('#quizEditForm').on('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    $.ajax({
        url: `/questions/${test_id}`,
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        success: function(res) {
            alert(res.message);
            location.reload();
        },
        error: function(xhr) {
            if (xhr.status === 422) {
                const errors = xhr.responseJSON.errors;
                let message = '';
                Object.values(errors).forEach(err => {
                    message += err.join('\n') + '\n';
                });
                alert(message);
            } else {
                alert('Something went wrong.');
            }
        }
    });
});*/

$(document).ready(function() {
    oldQuestions.forEach(addQuestionWithData);
});
</script>
@endpush
